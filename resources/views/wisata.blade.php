<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisatas'; // nama tabel
    protected $primaryKey = 'id_wisata'; // kalau pakai id custom

    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'harga',
    ];
}
