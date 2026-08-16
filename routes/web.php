<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BusinessCategoryController;
use App\Http\Controllers\Admin\SellerAccountController;
use App\Http\Controllers\Admin\VerificationController;
// Berikan alias "as SellerProfileController" supaya namanya tidak bentrok
use App\Http\Controllers\Penjual\ProfileController as SellerProfileController;
use App\Http\Controllers\Penjual\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Penjual\ReportController as SellerReportController;

// Rute Publik (Pengunjung Umum)
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/umkm', [FrontController::class, 'umkm'])->name('umkm.index');
Route::get('/umkm/{id}', [FrontController::class, 'showUmkm'])->name('umkm.show');
Route::get('/produk', [FrontController::class, 'produk'])->name('produk.index');
Route::get('/produk/{id}', [FrontController::class, 'showProduk'])->name('produk.show');
Route::post('/produk/{id}/ulasan', [FrontController::class, 'storeReview'])->name('produk.review');
Route::get('/tentang', [FrontController::class, 'tentang'])->name('tentang');
Route::get('/daftar-umkm', [\App\Http\Controllers\FrontController::class, 'daftarUmkm'])->name('daftar-umkm');
Route::post('/daftar-umkm', [\App\Http\Controllers\FrontController::class, 'storeUmkm'])->name('daftar-umkm.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route khusus Admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD Kategori Usaha
    Route::resource('kategori-usaha', BusinessCategoryController::class);
    
    // Manajemen Akun Penjual
    Route::resource('akun-penjual', SellerAccountController::class);
    
    // Verifikasi UMKM
    Route::get('verifikasi', [VerificationController::class, 'index'])->name('verifikasi.index');
    Route::post('verifikasi/{seller}', [VerificationController::class, 'verify'])->name('verifikasi.process');
    
    // Laporan Admin (PDF)
    Route::get('laporan/unduh', [AdminReportController::class, 'download'])->name('laporan.download');
});

// Route khusus Penjual (Seller)
Route::middleware(['auth'])->prefix('penjual')->name('seller.')->group(function () {
    
    // Dashboard Penjual
    Route::get('/dashboard', function () {
        return view('penjual.dashboard');
    })->name('dashboard');

    // Kelola Profil Toko / UMKM
    Route::get('/profil', [SellerProfileController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [SellerProfileController::class, 'update'])->name('profil.update');
    
    // CRUD Produk
    Route::resource('produk', ProductController::class);

    // Laporan Penjual (PDF)
    Route::get('laporan/unduh', [SellerReportController::class, 'download'])->name('laporan.download');
});

require __DIR__.'/auth.php';