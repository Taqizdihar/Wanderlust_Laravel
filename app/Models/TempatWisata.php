<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model {
    use HasFactory;

    protected $table = 'tempat_wisatas';
    protected $primaryKey = 'id_tempat';
    protected $fillable = [
        'nama_tempat',
        'alamat_tempat',
        'jenis_tempat',
        'waktu_buka',
        'waktu_tutup',
        'deskripsi',
    ];

    public function pemilikTempatWisata() {
        return $this->belongsTo(PemilikTempatWisata::class, 'id_ptw', 'id_ptw');
    }

    public function fotoTempatWisatas() {
        return $this->hasMany(FotoTempatWisata::class, 'id_tempat', 'id_tempat');
    }

    public function paketWisatas() {
        return $this->hasMany(PaketWisata::class, 'id_tempat', 'id_tempat');
    }

    public function penilaians() {
        return $this->hasMany(Penilaian::class, 'id_tempat', 'id_tempat');
    }

    public function bookmarks() {
        return $this->hasMany(Bookmark::class, 'id_tempat', 'id_tempat');
    }
    
    // --- ACCESSOR/METHOD UNTUK FAVORIT VIEW ---

    // Mendapatkan harga termurah dari tabel paket_wisatas
    public function getHargaTermurahAttribute() {
        return $this->paketWisatas()->min('harga'); 
    }
    
    // Mendapatkan kuota tiket (diambil dari paket termurah/pertama, menggunakan kolom 'jumlah')
    public function getKuotaTiketAttribute() {
         // Kolom kuota di paket_wisatas bernama 'jumlah'
         $paket = $this->paketWisatas()->orderBy('harga')->first();
         return $paket ? $paket->jumlah : 0; 
    }

    // Mendapatkan rating rata-rata (Kolom rating di penilaians bernama 'penilaian')
    public function getAverageRatingAttribute() {
        // Hanya hitung rating dari penilaian yang sudah disetujui/diselesaikan
        return $this->penilaians()->where('status_penilaian', 'disetujui')->avg('penilaian');
    }
}