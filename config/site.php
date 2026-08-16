<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Identitas Website
    |--------------------------------------------------------------------------
    */

    'name' => 'Katalog UMKM Desa Tedunan',

    'short_name' => 'Katalog UMKM',

    'village_name' => 'Desa Tedunan',

    'description' => 'Sistem Katalog Digital UMKM & Potensi Desa',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    */

    'logos' => [
        'desa' => 'images/logoDesa.png',
        'kkn' => 'images/logoKKN.png',
    ],

    /*
    |--------------------------------------------------------------------------
    | Navigasi
    |--------------------------------------------------------------------------
    |
    | route = nama route Laravel
    | label = teks yang ditampilkan
    | active = pola route untuk menentukan menu aktif
    |
    */

    'navigation' => [

        [
            'label' => 'Beranda',
            'route' => 'home',
            'active' => 'home',
        ],

        [
            'label' => 'Tentang Desa',
            'route' => 'tentang',
            'active' => 'tentang',
        ],

        [
            'label' => 'UMKM',
            'route' => 'umkm.index',
            'active' => 'umkm.*',
        ],

        [
            'label' => 'Produk',
            'route' => 'produk.index',
            'active' => 'produk.*',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Tombol Autentikasi
    |--------------------------------------------------------------------------
    */

    'auth' => [

        'login_label' => 'Masuk',

        'register_label' => 'Daftar UMKM',

        'dashboard_label' => 'Ke Dashboard',

        'dashboard_routes' => [
            'admin' => 'admin.dashboard',
            'seller' => 'seller.dashboard',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Footer
    |--------------------------------------------------------------------------
    */

    'footer' => [

        'copyright' => 'Pemerintah Desa Tedunan',

        'developer' => 'KKN-T UNDIP 88 2026',

        'description' => 'Sistem Katalog Digital UMKM & Potensi Desa',

    ],

];