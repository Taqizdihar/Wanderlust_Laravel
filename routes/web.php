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
use App\Http\Controllers\WisataController;



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



Route::get('/wisata/create', [WisataController::class, 'create'])->name('wisata.create');
Route::post('/wisata/store', [WisataController::class, 'store'])->name('wisata.store');

});


//admin


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // USER
    Route::get('user', [AdminUserController::class, 'index'])->name('user.index');
    Route::get('user/status/{id}', [AdminUserController::class, 'updateStatus'])->name('user.status');
    Route::delete('user/delete/{id}', [AdminUserController::class, 'destroy'])->name('user.delete');
    // routes/web.php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    // ... Rute lainnya
    
    // Rute untuk Kelola User
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    // routes/web.php
Route::get('/users', [UserController::class, 'index'])->name('user.index');
});

    // WISATA - INI YANG KAMU BUAT
    Route::get('wisata', [WisataController::class, 'index'])->name('wisata.index');
    Route::get('wisata/tambah', [WisataController::class, 'create'])->name('wisata.create');
    Route::post('wisata/store', [WisataController::class, 'store'])->name('wisata.store');
    Route::get('wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
    Route::get('wisata/verifikasi/{id}', [WisataController::class, 'verifikasi'])->name('wisata.verifikasi');
    Route::delete('wisata/hapus/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');

    // Keuangan
    Route::get('keuangan', [AdminController::class, 'kelolaKeuangan'])->name('keuangan.index');

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



