<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessCategory;

class BusinessCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kuliner (Makanan & Minuman)', 'description' => 'Usaha yang bergerak di bidang pengolahan makanan, minuman, dan warung makan.'],
            ['name' => 'Kerajinan Tangan (Kriya)', 'description' => 'Produk kerajinan buatan tangan warga seperti anyaman, mebel, atau hiasan.'],
            ['name' => 'Pakaian & Fashion', 'description' => 'Produksi dan penjualan baju, kain, jahit, atau aksesoris pakaian.'],
            ['name' => 'Pertanian & Peternakan', 'description' => 'Hasil bumi, sayuran segar, dan produk hewani dari peternak desa.'],
            ['name' => 'Jasa & Lainnya', 'description' => 'Penyediaan jasa seperti perbaikan elektronik, potong rambut, dll.'],
        ];

        foreach ($categories as $category) {
            BusinessCategory::create($category);
        }
    }
}