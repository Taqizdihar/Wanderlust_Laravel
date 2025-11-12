<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUp extends Model {
    use HasFactory;

    protected $table = 'top_ups';
    protected $primaryKey = 'id_topup';
    protected $fillable = ['jumlah','metode','tanggal_topup',];
    public $timestamps = false;

    public function wisatawan() {
        return $this->belongsTo(Wisatawan::class, 'id_wisatawan', 'id_wisatawan');
    }
}