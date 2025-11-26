<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatWisata; // Import Model

class DestinasiController extends Controller
{
    /**
     * Menampilkan daftar semua destinasi wisata.
     */
    public function index()
    {
        // Logika untuk mengambil semua destinasi (atau dengan paginasi)
        $semuaDestinasi = TempatWisata::orderBy('nama_tempat', 'asc')->paginate(12);

        // Kirim data ke view destinasi.blade.php
        return view('destinasi', compact('semuaDestinasi'));
    }
}