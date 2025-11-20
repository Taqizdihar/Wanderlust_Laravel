<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model {
    use HasFactory;

    protected $primaryKey = 'id_wisatawan';
    protected $fillable = ['tanggal_lahir','jenis_kelamin','usia','alamat','status_akun','kota_asal','preferensi_wisata'];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function transaksis() {
        return $this->hasMany(Transaksi::class, 'id_wisatawan', 'id_wisatawan');
    }

    public function topUps() {
        return $this->hasMany(TopUp::class, 'id_wisatawan', 'id_wisatawan');
    }

    public function penilaians() {
        return $this->hasMany(Penilaian::class, 'id_wisatawan', 'id_wisatawan');
    }

    public function bookmarks() {
        return $this->hasMany(Bookmark::class, 'id_wisatawan', 'id_wisatawan');
    }
}