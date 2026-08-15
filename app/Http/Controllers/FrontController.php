<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Review;

class FrontController extends Controller
{
    // Menampilkan halaman Beranda (Home)
    public function index()
    {
        // Ambil beberapa produk terbaru untuk ditampilkan di beranda
        $latestProducts = Product::where('status', 'available')
                            ->with(['images', 'seller'])
                            ->latest()
                            ->take(6)
                            ->get();

        return view('home', compact('latestProducts'));
    }

    // Menampilkan daftar semua UMKM
    public function umkm(Request $request)
    {
        // Hanya ambil UMKM yang status verifikasinya 'approved'
        $query = Seller::where('verification_status', 'approved')->with('businessCategory');

        // (Nanti logika pencarian/filter RT RW bisa kita tambahkan di sini)

        $sellers = $query->paginate(12);
        return view('front.umkm.index', compact('sellers'));
    }

    // Menampilkan detail satu UMKM beserta produk-produknya
    public function showUmkm($id)
    {
        $seller = Seller::where('verification_status', 'approved')->findOrFail($id);
        $products = Product::where('seller_id', $id)
                            ->where('status', 'available')
                            ->with('images')
                            ->get();

        return view('front.umkm.show', compact('seller', 'products'));
    }

    // Menampilkan katalog semua Produk
    public function produk(Request $request)
    {
        $query = Product::where('status', 'available')->with(['images', 'seller', 'productCategory']);

        // (Nanti logika pencarian nama produk dan kategori bisa ditambahkan di sini)

        $products = $query->paginate(16);
        return view('front.produk.index', compact('products'));
    }

    // Menampilkan detail satu produk dan ulasannya
    public function showProduk($id)
    {
        $product = Product::where('status', 'available')
                            ->with(['images', 'seller', 'productCategory', 'reviews'])
                            ->findOrFail($id);

        return view('front.produk.show', compact('product'));
    }

    // Menyimpan ulasan (komentar & rating) dari pengunjung
    public function storeReview(Request $request, $id)
    {
        // Pengunjung wajib mengisi nama dan email untuk memberi rating (1-5) dan komentar
        $request->validate([
            'visitor_name' => 'required|string|max:255',
            'visitor_email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string'
        ]);

        $product = Product::where('status', 'available')->findOrFail($id);

        Review::create([
            'product_id' => $product->id,
            'visitor_name' => $request->visitor_name,
            'visitor_email' => $request->visitor_email,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('produk.show', $id)->with('success', 'Terima kasih! Ulasan Anda berhasil dikirim.');
    }
}