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

    // Menampilkan daftar semua UMKM (beserta fitur pencarian)
    public function umkm(Request $request)
    {
        // Mulai dengan mengambil UMKM yang statusnya 'approved'
        $query = Seller::where('verification_status', 'approved')->with('businessCategory');

        // Filter berdasarkan nama UMKM
        if ($request->filled('search')) {
            $query->where('business_name', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori usaha
        if ($request->filled('kategori')) {
            $query->where('business_category_id', $request->kategori);
        }

        // Filter berdasarkan lokasi (RT dan RW)
        if ($request->filled('rt')) {
            $query->where('rt', $request->rt);
        }
        if ($request->filled('rw')) {
            $query->where('rw', $request->rw);
        }

        // Ambil data dengan pagination dan pertahankan parameter URL (appends)
        $sellers = $query->paginate(12)->appends($request->query());
        
        // Ambil daftar kategori untuk ditampilkan di dropdown filter UI
        $categories = \App\Models\BusinessCategory::all();

        return view('front.umkm.index', compact('sellers', 'categories'));
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

    // Menampilkan katalog semua Produk (beserta fitur pencarian)
    public function produk(Request $request)
    {
        // Mulai dengan mengambil produk yang statusnya 'available'
        $query = Product::where('status', 'available')->with(['images', 'seller', 'productCategory']);

        // Filter berdasarkan nama produk
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori produk
        if ($request->filled('kategori')) {
            $query->where('product_category_id', $request->kategori);
        }

        // Ambil data dengan pagination dan pertahankan parameter URL
        $products = $query->paginate(16)->appends($request->query());
        
        // Ambil daftar kategori untuk ditampilkan di dropdown filter UI
        $categories = \App\Models\ProductCategory::all();

        return view('front.produk.index', compact('products', 'categories'));
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