<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // READ: Menampilkan halaman form edit profil
    public function edit()
    {
        // Ambil data penjual berdasarkan user yang sedang login
        $seller = Auth::user()->seller;
        
        // Arahkan ke view (UI-nya nanti kita buat)
        return view('penjual.profil.edit', compact('seller'));
    }

    // UPDATE: Memproses perubahan data profil
    public function update(Request $request)
    {
        $seller = Auth::user()->seller;
        
        // AMBIL SEMUA INPUT FORM, KECUALI _token DAN _method
        $data = $request->except(['_token', '_method']);

        // Jika ada upload foto profil baru
        if ($request->hasFile('profile_image')) {
            // Hapus foto lama dari penyimpanan agar hardisk tidak penuh
            if ($seller->profile_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($seller->profile_image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($seller->profile_image);
            }
            
            // Simpan foto baru ke folder storage/app/public/profil
            $data['profile_image'] = $request->file('profile_image')->store('profil', 'public');
        }

        // Update data ke database
        $seller->update($data);

        return redirect()->route('seller.profil.edit')->with('success', 'Profil UMKM berhasil diperbarui!');
    }
}