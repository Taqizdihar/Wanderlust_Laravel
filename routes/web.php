<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\DashboardPTWController;
use App\Http\Controllers\PropertyPTWController;
use App\Http\Controllers\AddPropertyPTWController;
use App\Http\Controllers\EditPropertyPTWController;
use App\Http\Controllers\TempatWisataController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerifikasiDetailController; // IMPORT Controller BARU

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PencarianController;


//untuk autentikasi - umum
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//untuk pemilik tempat wisata (PTW) - Taqi
Route::get('/dashboard-ptw', [DashboardPTWController::class, 'index'])->name('dashboard.ptw');
Route::get('/properties-ptw', [PropertyPTWController::class, 'index'])->name('properties.ptw');
Route::get('/add-property-ptw', [AddPropertyPTWController::class, 'index'])->name('add.property.ptw');
Route::post('/add-property-ptw', [AddPropertyPTWController::class, 'store'])->name('store.property.ptw');
Route::get('/edit-property-ptw/{id}', [EditPropertyPTWController::class, 'edit'])->name('edit.property.ptw');
Route::post('/edit-property-ptw/{id}', [EditPropertyPTWController::class, 'update'])->name('update.property.ptw');
Route::delete('/delete-property-ptw/{id}', [EditPropertyPTWController::class, 'destroy'])->name('delete.property.ptw');

//untuk wisatawan - Faiz
Route::get('/editProfil', [EditProfilController::class,'index'])->name('editProfil');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/edit-profil', [EditProfilController::class, 'show'])->name('edit-profil');
Route::get('/homeWisatawan', function () {
    return redirect('/home');
});
Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian');

//untuk administrator ikaa canZ
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
Route::get('/tempat-wisata', [TempatWisataController::class, 'index'])->name('tempat-wisata');
Route::prefix('verifikasi-wisata')->group(function () {
Route::get('/{id}/detail', [VerifikasiDetailController::class, 'showDetail'])->name('verifikasi.detail');
Route::post('/{id}/update', [VerifikasiDetailController::class, 'updateStatus'])->name('verifikasi.update');
    
});