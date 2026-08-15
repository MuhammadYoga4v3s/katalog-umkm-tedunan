<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function download()
    {
        // Mengambil statistik untuk admin
        $totalUMKM = Seller::where('verification_status', 'approved')->count();
        $totalProduk = Product::count();
        $sellers = Seller::withCount('products')->get();

        // Mengubah view HTML menjadi PDF
        // (File view 'admin.laporan.pdf' akan kita buat nanti saat masuk fase UI)
        $pdf = Pdf::loadView('admin.laporan.pdf', compact('totalUMKM', 'totalProduk', 'sellers'));
        
        return $pdf->download('Laporan_Platform_UMKM_Tedunan.pdf');
    }
}