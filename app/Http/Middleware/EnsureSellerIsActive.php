<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureSellerIsActive
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Belum login
        if (!$user) {
            return redirect()->route('login');
        }

        // Bukan seller
        if ($user->role !== 'seller') {
            abort(403, 'Anda tidak memiliki akses ke halaman penjual.');
        }

        // Seller tidak aktif
        if ($user->status !== 'active') {

            // Logout menggunakan Auth facade
            Auth::logout();

            // Hapus session login
            $request->session()->invalidate();

            // Buat CSRF token baru
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Akun penjual Anda sedang dinonaktifkan. Silakan hubungi administrator Desa Tedunan.',
                ]);
        }

        return $next($request);
    }
}