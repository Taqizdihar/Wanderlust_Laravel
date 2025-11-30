<?php

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
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



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

Route::get('/detail/{id_tempat}', [DestinasiController::class, 'show'])->name('destinasi.detail');

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
    Route::get('/editProfil', [editProfilController::class, 'index'])->name('editProfil');
    Route::get('/profil', [\App\Http\Controllers\ProfilController::class, 'showProfile'])->name('profil');
    Route::get('/edit-profil', [\App\Http\Controllers\editProfilController::class, 'show'])->name('edit-profil');
    Route::post('/update-profil', [\App\Http\Controllers\editProfilController::class, 'update'])->name('update.profil');

    // Route untuk Halaman Favorit/Bookmark (Perlu dibuat)
    Route::get('/favorit', [BookmarkController::class, 'index'])->name('bookmark.index');

    // Route untuk Halaman Penilaian (Perlu dibuat)
    Route::get('/daftar-penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');

    Route::middleware(['auth:wisatawan'])->group(function () {

        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
        Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
        Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    });
});


//admin
// routes/web.php


// Group Route untuk Admin Panel
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('wisata', [AdminController::class, 'kelolaWisata'])->name('wisata.index');
    Route::get('user', [AdminUserController::class, 'index'])->name('user.index');
    Route::get('user/status/{id}', [AdminUserController::class, 'status'])->name('user.status');
    Route::delete('user/{id}', [AdminUserController::class, 'delete'])->name('user.delete');
    Route::get('keuangan', [AdminController::class, 'kelolaKeuangan'])->name('keuangan.index');
    Route::prefix('admin/user')->name('admin.user.')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminUserController::class, 'index'])
            ->name('index');
        Route::get('/status/{id}', [\App\Http\Controllers\AdminUserController::class, 'updateStatus'])
            ->name('status');
        Route::delete('/delete/{id}', [\App\Http\Controllers\AdminUserController::class, 'destroy'])
            ->name('delete');
    });
});
   

Route::prefix('admin')->name('admin.')->group(function () {
    // ... Routes lain seperti dashboard, wisata, keuangan ...
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('wisata', [AdminController::class, 'kelolaWisata'])->name('wisata.index');
    Route::get('keuangan', [AdminController::class, 'kelolaKeuangan'])->name('keuangan.index');

    
    Route::get('user', [AdminUserController::class, 'index'])->name('user.index');

    Route::get('user/status/{id}', [AdminUserController::class, 'updateStatus'])->name('user.status');
    Route::delete('user/delete/{id}', [AdminUserController::class, 'destroy'])->name('user.delete');

});


// ATAU lebih umum, kamu bisa menggunakan route index dan menangkap parameter keyword-nya di Controller
// WISATAWAN
Route::get('/penilaian', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/penilaian/buat', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/penilaian/store', [ReviewController::class, 'store'])->name('reviews.store');

// ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/reviews', [ReviewController::class, 'adminIndex'])->name('admin.reviews.index');
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'adminEdit'])->name('admin.reviews.edit');
    Route::put('/reviews/{id}', [ReviewController::class, 'adminUpdate'])->name('admin.reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'adminDestroy'])->name('admin.reviews.destroy');
});



