<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Administrator extends Model
{
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'id_user',
        'jabatan'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
