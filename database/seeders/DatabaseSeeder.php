<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Seller;
use App\Models\BusinessCategory;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Review;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Gunakan Faker bahasa Indonesia
        $faker = Faker::create('id_ID');

        // ---------------------------------------------------
        // 1. BUAT AKUN ADMIN
        // ---------------------------------------------------
        User::create([
            'name' => 'Admin Desa Tedunan',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // ---------------------------------------------------
        // 2. BUAT KATEGORI USAHA & PRODUK
        // ---------------------------------------------------
        $bizCategories = ['Kuliner', 'Kerajinan Tangan', 'Agribisnis', 'Jasa & Layanan'];
        foreach ($bizCategories as $cat) {
            BusinessCategory::create([
                'name' => $cat,
                'description' => "Kategori usaha " . strtolower($cat) . " di Desa Tedunan."
            ]);
        }

        $prodCategories = ['Makanan Ringan', 'Minuman Tradisional', 'Souvenir Kayu', 'Pakaian & Kain', 'Hasil Pertanian'];
        foreach ($prodCategories as $cat) {
            ProductCategory::create([
                'name' => $cat,
                'description' => "Kategori produk " . strtolower($cat)
            ]);
        }

        // ---------------------------------------------------
        // 3. BUAT AKUN PENJUAL (SUDAH DISETUJUI / APPROVED)
        // ---------------------------------------------------
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => "penjual$i@gmail.com",
                'password' => Hash::make('password'),
                'role' => 'seller',
            ]);

            $seller = Seller::create([
                'user_id' => $user->id,
                'business_category_id' => rand(1, 4),
                'business_name' => "Toko " . $faker->company,
                'business_description' => $faker->paragraph(3),
                'owner_name' => $user->name,
                'phone' => '08' . $faker->randomNumber(8, true),
                'address' => $faker->streetAddress,
                'rt' => '0' . rand(1, 5),
                'rw' => '0' . rand(1, 3),
                'verification_status' => 'approved',
            ]);

            // ---------------------------------------------------
            // 4. BUAT PRODUK UNTUK MASING-MASING PENJUAL
            // ---------------------------------------------------
            for ($j = 1; $j <= rand(3, 6); $j++) {
                $product = Product::create([
                    'seller_id' => $seller->id,
                    'product_category_id' => rand(1, 5),
                    'name' => "Produk " . ucfirst($faker->words(2, true)),
                    'description' => $faker->text,
                    'price' => rand(10, 200) * 1000, // Harga acak Rp 10.000 - Rp 200.000
                    'stock' => rand(5, 50),
                    'status' => 'available',
                ]);

                // ---------------------------------------------------
                // 5. BUAT ULASAN (REVIEW) UNTUK PRODUK INI
                // ---------------------------------------------------
                for ($k = 1; $k <= rand(1, 4); $k++) {
                    Review::create([
                        'product_id' => $product->id,
                        'visitor_name' => $faker->name,
                        'visitor_email' => $faker->freeEmail,
                        'rating' => rand(3, 5), // Rating 3-5 agar tokonya terlihat lumayan bagus
                        'comment' => $faker->sentence(6),
                    ]);
                }
            }
        }

        // ---------------------------------------------------
        // 6. BUAT AKUN PENJUAL (PENDING / ANTREAN VERIFIKASI)
        // ---------------------------------------------------
        for ($i = 6; $i <= 8; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => "pending$i@gmail.com",
                'password' => Hash::make('password'),
                'role' => 'seller',
            ]);

            Seller::create([
                'user_id' => $user->id,
                'business_category_id' => rand(1, 4),
                'business_name' => "Usaha " . $faker->company,
                'business_description' => $faker->paragraph,
                'owner_name' => $user->name,
                'phone' => '08' . $faker->randomNumber(8, true),
                'address' => $faker->streetAddress,
                'rt' => '0' . rand(1, 5),
                'rw' => '0' . rand(1, 3),
                'verification_status' => 'pending',
            ]);
        }
    }
}