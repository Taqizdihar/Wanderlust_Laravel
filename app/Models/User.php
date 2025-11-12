<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use HasFactory, Notifiable;
    protected $primaryKey = 'id_user';
    protected $fillable = ['nama','email','phone_number','password',];
    protected $hidden = ['password','remember_token',];

    public function administrator() {
        return $this->hasOne(Administrator::class, 'id_user', 'id_user');
    }

    public function wisatawan() {
        return $this->hasOne(Wisatawan::class, 'id_user', 'id_user');
    }

    public function pemilikTempatWisata() {
        return $this->hasOne(PemilikTempatWisata::class, 'id_user', 'id_user');
    }
}