<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth

class EditPropertyPTWController extends Controller

{
    // FIX: Mengubah method show untuk mengambil data dari database
    public function show()
    {
        // Pastikan user sudah login (Middleware sudah melindungi route ini)
        $user = Auth::user();

        // Memuat data Wisatawan yang terhubung (relasi wisatawan() sudah ada di User.php)
        $wisatawan = $user->wisatawan; 

        // Kirim data yang digabungkan ke view
        // Kita hanya akan mengirim $user (yang mengandung semua data yang dibutuhkan)
        return view('editProfil', compact('user', 'wisatawan'));
    }

    // FIX: Mengubah method update untuk menyimpan ke database (belum dilakukan, ini hanya placeholder)
    public function update(Request $request)
    {
        // FIX: Anda perlu mengganti logika ini agar menyimpan ke tabel users dan wisatawan
        return redirect()->back()->with('error', 'Update profil belum diimplementasikan ke database.');
    }
}