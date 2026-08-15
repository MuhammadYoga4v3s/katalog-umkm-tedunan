<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // READ: Menampilkan daftar produk milik penjual
    public function index()
    {
        $seller = Auth::user()->seller;
        // Ambil produk beserta kategori dan foto pertamanya
        $products = Product::where('seller_id', $seller->id)
                            ->with(['productCategory', 'images'])
                            ->get();

        return view('penjual.produk.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        // Penjual butuh daftar kategori produk untuk dipilih di form
        $categories = ProductCategory::all();
        return view('penjual.produk.create', compact('categories'));
    }

    // CREATE: Menyimpan data produk dan foto ke database
    public function store(Request $request)
    {
        $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:available,unavailable',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048' // Validasi untuk banyak foto
        ]);

        $seller = Auth::user()->seller;

        DB::transaction(function () use ($request, $seller) {
            // 1. Simpan data utama produk
            $product = Product::create([
                'seller_id' => $seller->id,
                'product_category_id' => $request->product_category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'status' => $request->status,
            ]);

            // 2. Simpan foto-foto produk (jika ada yang diunggah)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $file) {
                    $path = $file->store('produk', 'public');
                    
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path,
                        'sort_order' => $index + 1,
                    ]);
                }
            }
        });

        return redirect()->route('seller.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // UPDATE: Memperbarui data produk
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:available,unavailable',
        ]);

        $product = Product::where('seller_id', Auth::user()->seller->id)->findOrFail($id);

        $product->update($request->except(['_token', '_method']));

        return redirect()->route('seller.produk.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    // DELETE: Menghapus produk (termasuk menghapus file foto dari folder)
    public function destroy(string $id)
    {
        $product = Product::where('seller_id', Auth::user()->seller->id)->findOrFail($id);

        // Hapus file foto dari folder storage (agar hardisk tidak penuh)
        foreach ($product->images as $image) {
            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
        }

        // Hapus data produk (tabel product_images akan otomatis terhapus karena cascadeOnDelete)
        $product->delete();

        return redirect()->route('seller.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}