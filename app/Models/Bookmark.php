<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {
    use HasFactory;
    
    protected $primaryKey = 'id_bookmark';
    protected $fillable = ['tanggal_simpan',];

    public function wisatawan() {
        return $this->belongsTo(Wisatawan::class, 'id_wisatawan', 'id_wisatawan');
    }

    public function tempatWisata() {
        return $this->belongsTo(TempatWisata::class, 'id_tempat', 'id_tempat');
    }
}