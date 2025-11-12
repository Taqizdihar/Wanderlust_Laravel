<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model {
    use HasFactory;

    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['tanggal_bayar',];
    public $timestamps = false;

    public function transaksi() {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}