<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function download()
    {
        $seller = Auth::user()->seller;
        
        // Mengambil produk milik penjual beserta ulasan dan rata-rata ratingnya
        $products = $seller->products()
                           ->with('reviews')
                           ->withAvg('reviews', 'rating')
                           ->get();

        // Mengubah view HTML menjadi PDF
        // (File view 'penjual.laporan.pdf' akan kita buat nanti saat masuk fase UI)
        $pdf = Pdf::loadView('penjual.laporan.pdf', compact('seller', 'products'));
        
        return $pdf->download('Laporan_Toko_' . str_replace(' ', '_', $seller->business_name) . '.pdf');
    }
}