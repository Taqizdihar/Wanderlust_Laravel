<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {
    use HasFactory;
    
    protected $primaryKey = 'id_bookmark';
    // Tambahkan id_wisatawan dan id_tempat ke fillable agar bisa di-create
    protected $fillable = ['id_wisatawan', 'id_tempat', 'tanggal_simpan','catatan','kategori']; 
    public $timestamps = false; // Karena tidak ada created_at/updated_at di migration

    public function wisatawan() {
        return $this->belongsTo(Wisatawan::class, 'id_wisatawan', 'id_wisatawan');
    }

    public function tempatWisata() {
        return $this->belongsTo(TempatWisata::class, 'id_tempat', 'id_tempat');
    }
}