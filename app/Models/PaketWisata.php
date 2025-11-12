<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model {
    use HasFactory;

    protected $table = 'paket_wisatas';
    protected $primaryKey = 'id_paket';
    protected $fillable = [
        'nama_paket',
        'harga',
        'jumlah',
        'deskripsi',
    ];

    public function tempatWisata() {
        return $this->belongsTo(TempatWisata::class, 'id_tempat', 'id_tempat');
    }

    public function transaksis() {
        return $this->hasMany(Transaksi::class, 'id_paket', 'id_paket');
    }
}