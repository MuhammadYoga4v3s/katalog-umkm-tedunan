<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'user_id',
        'business_category_id',
        'business_name',
        'business_description',
        'owner_name',
        'phone',
        'address',
        'rt',
        'rw',
        'profile_image',
        'google_maps',
        'verification_status',
    ];

    // Relasi balik ke tabel User (Setiap Penjual terhubung ke satu User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi balik ke Kategori Usaha (Setiap Penjual punya satu kategori usaha)
    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class);
    }

    // Relasi 1:N ke tabel Products (Satu penjual bisa punya banyak produk)
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Relasi 1:N ke tabel VerificationHistory (Riwayat verifikasi milik penjual)
    public function verificationHistories()
    {
        return $this->hasMany(VerificationHistory::class);
    }
}