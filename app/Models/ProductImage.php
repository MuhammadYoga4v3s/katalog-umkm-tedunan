<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    // Izinkan kolom-kolom ini untuk diisi secara massal
    protected $fillable = [
        'product_id',
        'image',
        'sort_order',
    ];

    // Relasi balik ke tabel Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}