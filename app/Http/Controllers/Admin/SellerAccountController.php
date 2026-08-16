<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SellerAccountController extends Controller
{
    // READ: Menampilkan daftar semua akun penjual
    public function index()
    {
        // Mengambil user yang rolenya 'seller', beserta data toko/sellernya
        $sellers = User::where('role', 'seller')->with('seller')->get();
        
        // Return ke view yang nanti akan kita buat
        return view('admin.akun-penjual.index', compact('sellers'));
    }

    // CREATE: Menyimpan akun awal penjual yang didata oleh Admin
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'business_name' => 'required|string|max:255',
            'business_category_id' => 'required|exists:business_categories,id',
        ]);

        // Gunakan transaksi DB agar aman (jika satu gagal, semua dibatalkan)
        DB::transaction(function () use ($request) {
            // 1. Buat akun di tabel users
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'seller',
                'status' => 'active', // Langsung aktif karena dibuat oleh admin
            ]);

            // 2. Buat profil awal di tabel sellers
            Seller::create([
                'user_id' => $user->id,
                'business_category_id' => $request->business_category_id,
                'owner_name' => $request->name,
                'business_name' => $request->business_name,
                // Kolom wajib di database kita isi default sementara (bisa diubah penjual nanti)
                'phone' => '-', // <--- TAMBAHKAN BARIS INI
                'address' => 'Belum diisi',
                'rt' => '-',
                'rw' => '-',
                'verification_status' => 'approved', // Otomatis terverifikasi
                'verified_at' => now(),
            ]);
        });

        return redirect()->route('admin.akun-penjual.index')->with('success', 'Akun penjual berhasil dibuat!');
    }

    // UPDATE: Mengubah status akun (Aktif / Tidak Aktif)
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.akun-penjual.index')->with('success', 'Status akun berhasil diperbarui!');
    }

    // DELETE: Menghapus akun penjual
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        
        // Karena di file migrasi kita pakai cascadeOnDelete(), 
        // menghapus user otomatis akan menghapus data di tabel sellers miliknya
        $user->delete();

        return redirect()->route('admin.akun-penjual.index')->with('success', 'Akun penjual berhasil dihapus!');
    }
}