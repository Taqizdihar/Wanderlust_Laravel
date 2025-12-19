<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
    protected $table = 'wisatawan';
    protected $primaryKey = 'id_wisatawan';

    protected $fillable = ['id_user', 'alamat', 'no_telepon'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
