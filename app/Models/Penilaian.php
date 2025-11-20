<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model {
    use HasFactory;

    protected $table = 'penilaians';
    protected $primaryKey = 'id_penilaian';
    protected $fillable = ['penilaian','ulasan','tanggal_penilaian','status_penilaian','judul_ulasan','foto_ulasan'];
    public $timestamps = false;

    public function wisatawan() {
        return $this->belongsTo(Wisatawan::class, 'id_wisatawan', 'id_wisatawan');
    }

    public function tempatWisata() {
        return $this->belongsTo(TempatWisata::class, 'id_tempat', 'id_tempat');
    }
}