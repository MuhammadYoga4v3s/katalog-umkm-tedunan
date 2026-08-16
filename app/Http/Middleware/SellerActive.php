<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SellerActive
{
    /**
     * Handle an incoming request.
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        /*
        |--------------------------------------------------------------------------
        | Pastikan user sudah login
        |--------------------------------------------------------------------------
        */

        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Pastikan hanya seller yang diproses middleware ini
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'seller') {

            /*
            |--------------------------------------------------------------------------
            | Jika akun seller tidak aktif
            |--------------------------------------------------------------------------
            */

            if ($user->status !== 'active') {

                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()
                    ->route('login')
                    ->withErrors([
                        'email' => 'Akun UMKM Anda sedang tidak aktif. Silakan hubungi administrator Desa Tedunan.',
                    ]);
            }
        }

        return $next($request);
    }
}