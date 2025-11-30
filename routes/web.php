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
use App\Http\Controllers\VerifikasiDetailController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\BookmarkController;   
use App\Http\Controllers\PenilaianController; 
use App\Http\Controllers\DestinasiController;  
use App\Http\Controllers\PesanTiketController; 
use App\Http\Controllers\ReviewController;


//untuk autentikasi - umum
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//untuk pemilik tempat wisata (PTW) - Taqi
Route::get('/dashboard-ptw', [DashboardPTWController::class, 'index'])->name('dashboard.ptw');
Route::get('/properties-ptw', [PropertyPTWController::class, 'index'])->name('properties.ptw');
Route::get('/add-property-ptw', [AddPropertyPTWController::class, 'index'])->name('add.property.ptw');
Route::post('/add-property-ptw', [AddPropertyPTWController::class, 'store'])->name('store.property.ptw');
Route::get('/edit-property-ptw/{id}', [EditPropertyPTWController::class, 'edit'])->name('edit.property');
Route::post('/edit-property-ptw/{id}', [EditPropertyPTWController::class, 'update'])->name('update.property.ptw');
Route::delete('/delete-property-ptw/{id}', [EditPropertyPTWController::class, 'destroy'])->name('delete.property.ptw');


// ----------------------------------------------------
// ROUTE PUBLIK (TIDAK MEMERLUKAN LOGIN / GUEST ACCESS)
// ----------------------------------------------------
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/homeWisatawan', function () {
    return redirect('/home');
});
Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian');
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index'); 


// ----------------------------------------------------
// ROUTE WISATAWAN (MEMERLUKAN LOGIN / AUTHENTICATION)
// ----------------------------------------------------
// Asumsi Guard adalah 'wisatawan'
Route::middleware(['auth:wisatawan'])->group(function () {
    
    // Aksi Bookmark (dari AJAX/Fetch)
    Route::post('/bookmark/toggle/{idTempat}', [BookmarkController::class, 'toggle'])->name('bookmark.toggle'); 

    // Aksi Penilaian (POST untuk menyimpan ulasan dan rating)
    Route::post('/penilaian/store', [PenilaianController::class, 'store'])->name('penilaian.store'); 
    
    // Pesan Tiket
    Route::get('/pesan-tiket/{idPaket}', [PesanTiketController::class, 'showForm'])->name('pesan.tiket.form'); 
    Route::post('/pesan-tiket/store', [PesanTiketController::class, 'store'])->name('pesan.tiket.store'); 

    Route::get('/riwayat-transaksi', [\App\Http\Controllers\PesanTiketController::class, 'riwayat'])->name('transaksi.riwayat');

    // Halaman Profil 
    Route::get('/editProfil', [editProfilController::class,'index'])->name('editProfil');
    Route::get('/profil', [\App\Http\Controllers\ProfilController::class, 'showProfile'])->name('profil');
    Route::get('/edit-profil', [\App\Http\Controllers\editProfilController::class, 'show'])->name('edit-profil');
    Route::post('/update-profil', [\App\Http\Controllers\editProfilController::class, 'update'])->name('update.profil');

    // Route untuk Halaman Favorit/Bookmark (Perlu dibuat)
    Route::get('/favorit', [BookmarkController::class, 'index'])->name('bookmark.index');
    
    // Route untuk Halaman Penilaian (Perlu dibuat)
    Route::get('/daftar-penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');

});


//untuk administrator ikaa canZ
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
Route::get('/tempat-wisata', [TempatWisataController::class, 'index'])->name('tempat-wisata');
Route::prefix('verifikasi-wisata')->group(function () {
Route::get('/{id}/detail', [VerifikasiDetailController::class, 'showDetail'])->name('verifikasi.detail');
Route::post('/{id}/update', [VerifikasiDetailController::class, 'updateStatus'])->name('verifikasi.update');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::resource('reviews', ReviewController::class);




});