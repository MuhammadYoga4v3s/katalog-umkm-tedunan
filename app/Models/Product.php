<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Tambahkan daftar kolom ini agar form bisa menyimpan & update data
    protected $fillable = [
        'seller_id',
        'product_category_id',
        'name',
        'description',
        'price',
        'stock',
        'status',
    ];

    // Relasi balik ke tabel Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // Relasi balik ke tabel ProductCategory
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    // Relasi 1:N ke tabel ProductImage
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Relasi 1:N ke tabel Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}