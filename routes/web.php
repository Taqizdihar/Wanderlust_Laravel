<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\editProfilController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/edit-profil', [ProfilController::class, 'edit'])->name('profil.edit');
Route::post('/edit-profil', [ProfilController::class, 'update'])->name('profil.update');    
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/editProfil', [editProfilController::class, 'index'])->name('editProfil');

Route::post('/updateProfil', [editProfilController::class, 'update'])->name('updateProfil');

Route::get('/', function () {
    return redirect('/home');
});
