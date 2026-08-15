<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi 1:1 ke tabel Sellers
    public function seller()
    {
        // Laravel otomatis akan mencari kolom 'user_id' di tabel sellers
        return $this->hasOne(Seller::class);
    }

    // Relasi 1:N ke tabel VerificationHistory (khusus Admin)
    public function verificationHistories()
    {
        // Kita harus sebut 'admin_id' karena namanya bukan standar 'user_id'
        return $this->hasMany(VerificationHistory::class, 'admin_id');
    }
}
