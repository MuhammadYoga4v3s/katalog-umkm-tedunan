<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Izinkan kolom-kolom ini untuk diisi secara massal
    protected $fillable = [
        'product_id',
        'visitor_name',
        'visitor_email',
        'rating',
        'comment',
    ];

    // Relasi balik ke tabel Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}