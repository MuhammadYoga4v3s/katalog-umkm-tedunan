<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;

// Admin
use App\Http\Controllers\Admin\BusinessCategoryController;
use App\Http\Controllers\Admin\SellerAccountController;
use App\Http\Controllers\Admin\VerificationController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

// Penjual
use App\Http\Controllers\Penjual\ProfileController as SellerProfileController;
use App\Http\Controllers\Penjual\ProductController;
use App\Http\Controllers\Penjual\ReportController as SellerReportController;


/*
|--------------------------------------------------------------------------
| ROUTE PUBLIK
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [FrontController::class, 'index'])
    ->name('home');

// Daftar UMKM
Route::get('/umkm', [FrontController::class, 'umkm'])
    ->name('umkm.index');

Route::get('/umkm/{id}', [FrontController::class, 'showUmkm'])
    ->name('umkm.show');

// Produk
Route::get('/produk', [FrontController::class, 'produk'])
    ->name('produk.index');

Route::get('/produk/{id}', [FrontController::class, 'showProduk'])
    ->name('produk.show');

// Ulasan Produk
Route::post('/produk/{id}/ulasan', [FrontController::class, 'storeReview'])
    ->name('produk.review');

// Tentang
Route::get('/tentang', [FrontController::class, 'tentang'])
    ->name('tentang');

// Pendaftaran UMKM
Route::get('/daftar-umkm', [FrontController::class, 'daftarUmkm'])
    ->name('daftar-umkm');

Route::post('/daftar-umkm', [FrontController::class, 'storeUmkm'])
    ->name('daftar-umkm.store');


/*
|--------------------------------------------------------------------------
| DASHBOARD DEFAULT
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| PROFILE USER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
|
| Admin tetap bisa mengakses sistem walaupun akun seller
| sedang inactive karena middleware active.seller hanya
| dipasang pada route penjual.
|
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard Admin
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Kategori Usaha
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'kategori-usaha',
            BusinessCategoryController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Akun Penjual
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'akun-penjual',
            SellerAccountController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Verifikasi UMKM
        |--------------------------------------------------------------------------
        */

        Route::get(
            'verifikasi',
            [VerificationController::class, 'index']
        )->name('verifikasi.index');

        Route::post(
            'verifikasi/{seller}',
            [VerificationController::class, 'verify']
        )->name('verifikasi.process');


        /*
        |--------------------------------------------------------------------------
        | Laporan Admin
        |--------------------------------------------------------------------------
        */

        Route::get(
            'laporan/unduh',
            [AdminReportController::class, 'download']
        )->name('laporan.download');
    });


/*
|--------------------------------------------------------------------------
| ROUTE PENJUAL / SELLER
|--------------------------------------------------------------------------
|
| Seller harus:
| 1. Login
| 2. Memiliki role seller
| 3. Memiliki status active
|
*/

Route::middleware(['auth', 'active.seller'])
    ->prefix('penjual')
    ->name('seller.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard Penjual
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {
            return view('penjual.dashboard');
        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Profil UMKM
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/profil',
            [SellerProfileController::class, 'edit']
        )->name('profil.edit');

        Route::put(
            '/profil',
            [SellerProfileController::class, 'update']
        )->name('profil.update');


        /*
        |--------------------------------------------------------------------------
        | Produk
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'produk',
            ProductController::class
        );


        /*
        |--------------------------------------------------------------------------
        | Laporan Penjual
        |--------------------------------------------------------------------------
        */

        Route::get(
            'laporan/unduh',
            [SellerReportController::class, 'download']
        )->name('laporan.download');
    });


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';