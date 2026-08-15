<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\VerificationHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
    // Menampilkan daftar UMKM yang menunggu verifikasi
    public function index()
    {
        // Ambil data penjual yang status verifikasinya masih 'pending'
        $pendingSellers = Seller::where('verification_status', 'pending')
                                ->with(['user', 'businessCategory'])
                                ->get();
                                
        // Arahkan ke view (UI kita buat nanti)
        return view('admin.verifikasi.index', compact('pendingSellers'));
    }

    // Memproses verifikasi (Terima / Tolak)
    public function verify(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'note' => 'nullable|string'
        ]);

        $seller = Seller::findOrFail($id);

        // Gunakan DB Transaction agar update tabel penjual, user, dan riwayat berjalan bersamaan
        DB::transaction(function () use ($request, $seller) {
            
            // 1. Update status di tabel sellers
            $seller->update([
                'verification_status' => $request->status,
                'verified_at' => $request->status === 'approved' ? now() : null,
            ]);

            // 2. Update status aktif/tidak aktif di tabel users
            // Jika ditolak, akun tetap inactive
            $seller->user->update([
                'status' => $request->status === 'approved' ? 'active' : 'inactive'
            ]);

            // 3. Catat ke tabel riwayat verifikasi
            VerificationHistory::create([
                'seller_id' => $seller->id,
                'admin_id' => Auth::id(), // ID Admin yang sedang login
                'status' => $request->status,
                'note' => $request->note,
            ]);
        });

        $pesan = $request->status === 'approved' ? 'UMKM berhasil diverifikasi!' : 'Pendaftaran UMKM ditolak.';
        return redirect()->route('admin.verifikasi.index')->with('success', $pesan);
    }
}