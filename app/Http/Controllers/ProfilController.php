<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Untuk menghitung usia

class ProfilController extends Controller
{
    /**
     * Menampilkan halaman Profil (View Mode) sesuai desain Figma.
     */
    public function showProfile()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Asumsi relasi user->wisatawan ada (sesuai editProfil.blade.php)
        // Pastikan Model User memiliki relasi hasOne/hasMany ke Model Wisatawan
        $wisatawan = $user->wisatawan; 

        // Hitung Usia (seperti pada contoh di Figma)
        $usia = null;
        if ($wisatawan && $wisatawan->tanggal_lahir) {
            $birthDate = Carbon::parse($wisatawan->tanggal_lahir);
            // Menggunakan diffInYears() untuk mendapatkan usia sebagai bilangan bulat
            $usiaTahun = $birthDate->diffInYears(Carbon::now());
            $usia = $usiaTahun . ' Tahun'; // Format output menjadi "30 Tahun"
        }

        // Tampilkan view profil
        return view('profil', compact('user', 'wisatawan', 'usia'));
    }
}