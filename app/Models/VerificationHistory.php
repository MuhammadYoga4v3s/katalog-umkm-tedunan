<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationHistory extends Model
{
    // Relasi balik ke tabel Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // Relasi balik ke tabel User (sebagai Admin)
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
