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

        // Validasi input dari form
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'business_description' => 'nullable|string',
            'address' => 'required|string',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'phone' => 'required|string|max:20',
            'google_maps' => 'nullable|url',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        // Simpan semua data request kecuali file foto
        $data = $request->except('profile_image');

        // Logika untuk upload foto profil baru
        if ($request->hasFile('profile_image')) {
            // Hapus foto lama jika ada
            if ($seller->profile_image) {
                Storage::disk('public')->delete($seller->profile_image);
            }
            // Simpan foto baru ke folder storage/app/public/profil
            $data['profile_image'] = $request->file('profile_image')->store('profil', 'public');
        }

        // Update data ke database
        $seller->update($data);

        return redirect()->route('seller.profil.edit')->with('success', 'Profil UMKM berhasil diperbarui!');
    }
}