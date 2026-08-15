<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BusinessCategoryController;
use App\Http\Controllers\Admin\SellerAccountController;
use App\Http\Controllers\Admin\VerificationController;

Route::get('/', function () {
    return view('home');
});

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
    
});

// Rute untuk Penjual
Route::get('/penjual/dashboard', function () {
    return view('penjual.dashboard');
})->middleware(['auth'])->name('seller.dashboard');

require __DIR__.'/auth.php';
