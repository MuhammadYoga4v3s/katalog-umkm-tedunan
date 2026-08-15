<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    // READ: Mengambil semua data kategori usaha dari database
    public function index()
    {
        $categories = BusinessCategory::all();
        
        // Nanti UI-nya kita buat belakangan, arahkan saja dulu ke file yang belum ada
        return view('admin.kategori-usaha.index', compact('categories'));
    }

    // (Kita lewati fungsi create(), show(), dan edit() karena nanti kita bisa pakai Modal pop-up di UI biar lebih simpel)

    // CREATE: Menyimpan data kategori usaha baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string'
        ]);

        // Simpan ke database
        BusinessCategory::create($request->all());

        return redirect()->route('admin.kategori-usaha.index')->with('success', 'Kategori Usaha berhasil ditambahkan!');
    }

    // UPDATE: Menyimpan perubahan data kategori usaha ke database
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string'
        ]);

        // Cari datanya, lalu update
        $category = BusinessCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.kategori-usaha.index')->with('success', 'Kategori Usaha berhasil diubah!');
    }

    // DELETE: Menghapus data kategori usaha dari database
    public function destroy(string $id)
    {
        // Cari datanya, lalu hapus
        $category = BusinessCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.kategori-usaha.index')->with('success', 'Kategori Usaha berhasil dihapus!');
    }
}