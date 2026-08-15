<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Relasi balik ke tabel Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
