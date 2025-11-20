<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model {
    use HasFactory;

    protected $primaryKey = 'id_admin';
    protected $fillable = ['jabatan',];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}