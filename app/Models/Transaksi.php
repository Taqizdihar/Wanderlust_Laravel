<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model {
    use HasFactory;

    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'jumlah_paket',
        'status_transaksi',
        'tanggal_transaksi',
        'total_harga',
    ];
    public $timestamps = false;

    public function wisatawan(){
        return $this->belongsTo(Wisatawan::class, 'id_wisatawan', 'id_wisatawan');
    }

    public function paketWisata(){
        return $this->belongsTo(PaketWisata::class, 'id_paket', 'id_paket');
    }

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class, 'id_transaksi', 'id_transaksi');
    }
}