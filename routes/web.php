<?php

<<<<<<< HEAD
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LoginController;
=======
>>>>>>> cf0ccf3e29b14772531bd2dbeff0ddc006209060
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\editProfilController;

<<<<<<< HEAD
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/edit-profil', [ProfilController::class, 'edit'])->name('profil.edit');
Route::post('/edit-profil', [ProfilController::class, 'update'])->name('profil.update');    
=======
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/editProfil', [editProfilController::class, 'index'])->name('editProfil');

Route::post('/updateProfil', [editProfilController::class, 'update'])->name('updateProfil');

Route::get('/', function () {
    return redirect('/home');
});
>>>>>>> cf0ccf3e29b14772531bd2dbeff0ddc006209060
