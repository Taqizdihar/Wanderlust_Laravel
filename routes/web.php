<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\editProfilController;
use App\Http\Controllers\DashboardPTWController;
use App\Http\Controllers\PropertyPTWController;
use App\Http\Controllers\AddPropertyPTWController;
use App\Http\Controllers\EditPropertyPTWController;
use App\Http\Controllers\TempatWisataController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerifikasiDetailController; // IMPORT Controller BARU




//untuk autentikasi
Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');
Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//untuk pemilik tempat wisata (PTW)
Route::get('/dashboard-ptw', [DashboardPTWController::class, 'index'])->name('dashboard.ptw');
Route::get('/properties-ptw', [PropertyPTWController::class, 'index'])->name('properties.ptw');
Route::get('/add-property-ptw', [AddPropertyPTWController::class, 'index'])->name('add.property.ptw');
Route::post('/add-property-ptw', [AddPropertyPTWController::class, 'store'])->name('store.property.ptw');
Route::get('/edit-property-ptw/{id}', [EditPropertyPTWController::class, 'edit'])->name('edit.property.ptw');
Route::post('/edit-property-ptw/{id}', [EditPropertyPTWController::class, 'update'])->name('update.property.ptw');
Route::delete('/delete-property-ptw/{id}', [EditPropertyPTWController::class, 'destroy'])->name('delete.property.ptw');

//untuk wisatawan
Route::get('/edit-profil', [ProfilController::class, 'edit'])->name('profil.edit');
Route::post('/edit-profil', [ProfilController::class, 'update'])->name('profil.update');    
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/editProfil', [editProfilController::class, 'index'])->name('editProfil');
Route::post('/updateProfil', [editProfilController::class, 'update'])->name('updateProfil');
Route::get('/homeWisatawan', function () {
    return redirect('/home');
});

//untuk administrator
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
Route::get('/tempat-wisata', [TempatWisataController::class, 'index'])->name('tempat-wisata');
Route::prefix('verifikasi-wisata')->group(function () {
Route::get('/{id}/detail', [VerifikasiDetailController::class, 'showDetail'])->name('verifikasi.detail');
Route::post('/{id}/update', [VerifikasiDetailController::class, 'updateStatus'])->name('verifikasi.update');
    
});