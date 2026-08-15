<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    // Relasi 1:N ke tabel Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
