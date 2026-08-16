<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Izinkan request login.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validasi login.
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
            ],

            'password' => [
                'required',
                'string',
            ],
        ];
    }

    /**
     * Proses autentikasi.
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');

        /*
        |--------------------------------------------------------------------------
        | Login
        |--------------------------------------------------------------------------
        */

        if (! Auth::attempt(
            $credentials,
            $this->boolean('remember')
        )) {

            RateLimiter::hit(
                $this->throttleKey()
            );

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Login berhasil → cek status akun
        |--------------------------------------------------------------------------
        */

        RateLimiter::clear(
            $this->throttleKey()
        );

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Jika akun seller tidak aktif
        |--------------------------------------------------------------------------
        */

        if (
            $user->role === 'seller' &&
            $user->status !== 'active'
        ) {

            Auth::logout();

            $this->session()->invalidate();
            $this->session()->regenerateToken();

            throw ValidationException::withMessages([
                'email' => 'Akun UMKM Anda sedang tidak aktif. Silakan hubungi administrator Desa Tedunan.',
            ]);
        }
    }

    /**
     * Pastikan tidak terkena rate limit.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts(
            $this->throttleKey(),
            5
        )) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn(
            $this->throttleKey()
        );

        throw ValidationException::withMessages([
            'email' => trans(
                'auth.throttle',
                [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]
            ),
        ]);
    }

    /**
     * Key untuk rate limiter.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('email'))
            . '|' .
            $this->ip()
        );
    }
}