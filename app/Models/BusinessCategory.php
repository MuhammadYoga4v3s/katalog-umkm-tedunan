<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    // Relasi 1:N ke tabel Sellers
    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }
}
