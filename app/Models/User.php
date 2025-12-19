<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

// PENTING: Jika kamu menggunakan nama file UserModel.php, maka class-nya harus UserModel
// Jika kamu menggunakannya untuk Login/Auth, sebaiknya extend Authenticatable.

class UserModel extends Authenticatable // Gunakan Authenticatable untuk fungsi login
{
    use SoftDeletes;
    
    // PENTING: Karena nama Model bukan 'User', kita harus arahkan ke tabel 'users'
    protected $table = 'users'; 
    
    // Kolom yang bisa diisi (sesuaikan dengan Migration dan Seeder kamu)
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
    ];
    
    // Kolom yang disembunyikan saat diakses (penting untuk keamanan)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tipe data kolom (penting untuk is_active sebagai boolean)
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean', // Pastikan kolom ini di-cast sebagai boolean
    ];
}