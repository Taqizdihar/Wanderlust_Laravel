<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib diimpor untuk mengambil user yang login

class EditProfilController extends Controller
{
    // FIX: Mengambil data user yang sudah di-authenticated dari database
    public function show()
    {
        // Pastikan user sudah login (Middleware sudah melindungi route ini)
        $user = Auth::user();

        // Mengambil data Wisatawan melalui relasi (relasi wisatawan() ada di Model User.php)
        // Ini akan mengambil semua data detail seperti Tanggal Lahir, Alamat, dll.
        $wisatawan = $user->wisatawan; 

        // FIX: Kirim data dengan nama variabel yang benar: 'user' dan 'wisatawan'
        return view('editProfil', compact('user', 'wisatawan'));
    }

    // UPDATE: Struktur dasar untuk menyimpan perubahan ke database (melalui model)
    public function update(Request $request)
    {
        // Anda perlu mengganti logika ini untuk menyimpan data ke tabel users dan wisatawan
        // Ini adalah placeholder untuk update DB yang sebenarnya:
        return redirect()->back()->with('error', 'Update profil belum diimplementasikan ke database.');
    }
}