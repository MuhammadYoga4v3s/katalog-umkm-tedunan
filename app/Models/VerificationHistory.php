<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationHistory extends Model
{
    // Izinkan kolom-kolom ini untuk diisi secara massal
    protected $fillable = [
        'seller_id',
        'admin_id',
        'status',
        'note',
    ];

    // Relasi balik ke tabel Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // Relasi balik ke tabel User (sebagai Admin yang memverifikasi)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}