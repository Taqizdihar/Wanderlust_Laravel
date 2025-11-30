<?php
// app/Models/Wisata.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    
    // Sesuaikan nama tabel jika tidak menggunakan konvensi default (Laravel default: wisatas)
    protected $table = 'wisata'; 

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga_tiket',
        'lokasi',
        'gambar', // Harus ada agar bisa diisi
    ];
}