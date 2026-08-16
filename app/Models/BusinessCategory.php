<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    // Izinkan kolom ini untuk diisi secara massal
    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi 1:N ke tabel Sellers
    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }
}