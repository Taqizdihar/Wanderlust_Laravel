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
use App\Http\Controllers\ProfilController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');
Route::get('/edit-profil', [ProfilController::class, 'edit'])->name('profil.edit');
Route::post('/edit-profil', [ProfilController::class, 'update'])->name('profil.update');    
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/editProfil', [editProfilController::class, 'index'])->name('editProfil');
Route::post('/updateProfil', [editProfilController::class, 'update'])->name('updateProfil');
Route::get('/lokasi', [TempatWisataController::class, 'show'])->name('lokasi.show');
Route::get('/dashboard-ptw', [DashboardPTWController::class, 'index'])->name('dashboard.ptw');
Route::get('/properties-ptw', [PropertyPTWController::class, 'index'])->name('properties.ptw');
Route::get('/add-property-ptw', [AddPropertyPTWController::class, 'index'])->name('add.property.ptw');
Route::post('/add-property-ptw', [AddPropertyPTWController::class, 'store'])->name('store.property.ptw');
Route::get('/edit-property-ptw/{id}', [EditPropertyPTWController::class, 'edit'])->name('edit.property.ptw');
Route::post('/edit-property-ptw/{id}', [EditPropertyPTWController::class, 'update'])->name('update.property.ptw');
Route::delete('/delete-property-ptw/{id}', [EditPropertyPTWController::class, 'destroy'])->name('delete.property.ptw');
Route::get('/lokasi/{id}', [PropertiController::class, 'show']);

Route::get('/homeWisatawan', function () {
    return redirect('/home');
});