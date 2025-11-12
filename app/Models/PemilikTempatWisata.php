<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikTempatWisata extends Model
{
    use HasFactory;

    protected $table = 'pemilik_tempat_wisatas';
    protected $primaryKey = 'id_ptw';
    protected $fillable = ['npwp','siu','alamat_bisnis',];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function tempatWisatas() {
        return $this->hasMany(TempatWisata::class, 'id_ptw', 'id_ptw');
    }
}