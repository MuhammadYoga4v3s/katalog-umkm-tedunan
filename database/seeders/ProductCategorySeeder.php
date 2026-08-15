<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Jajanan Pasar', 'description' => 'Kue tradisional basah maupun kering.'],
            ['name' => 'Makanan Kemasan', 'description' => 'Produk olahan yang dikemas dan tahan lama (keripik, abon, dll).'],
            ['name' => 'Minuman', 'description' => 'Minuman siap saji, jamu, sirup, atau kopi/teh bubuk.'],
            ['name' => 'Kerajinan Kayu & Bambu', 'description' => 'Barang kebutuhan rumah tangga atau hiasan dari kayu dan bambu.'],
            ['name' => 'Bahan Pokok (Sembako)', 'description' => 'Beras, minyak, gula, dan kebutuhan pokok sehari-hari.'],
            ['name' => 'Sayur & Buah', 'description' => 'Hasil panen segar langsung dari kebun warga.'],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}