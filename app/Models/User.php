<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * Ini adalah satu-satunya deklarasi $fillable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',     // Role (admin/user)
        'status',   // Status (aktif/nonaktif)
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Helper untuk mengecek apakah user adalah admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}