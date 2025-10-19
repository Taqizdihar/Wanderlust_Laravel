<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\editProfilController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');
Route::get('/edit-profil', [ProfilController::class, 'edit'])->name('profil.edit');
Route::post('/edit-profil', [ProfilController::class, 'update'])->name('profil.update');    
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/editProfil', [editProfilController::class, 'index'])->name('editProfil');

Route::post('/updateProfil', [editProfilController::class, 'update'])->name('updateProfil');

Route::get('/homeWisatawan', function () {
    return redirect('/home');
});

Route::get('/dashboard-ptw', [DashboardPTWController::class, 'index'])->name('dashboard.ptw');
