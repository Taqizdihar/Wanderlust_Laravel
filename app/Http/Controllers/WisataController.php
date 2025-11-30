<?php
// app/Http/Controllers/WisataController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Diperlukan untuk menangkap input search
use App\Models\Wisata; // Asumsikan Model kamu bernama Wisata

class WisataController extends Controller
{
    /**
     * Menampilkan semua data Wisata.
     */
    public function index()
    {
        // Logika untuk mengambil semua data (sebelum search)
        $data_wisata = Wisata::all(); 

        return view('kelola_wisata', [
            'wisatas' => $data_wisata // Mengirim data ke view
        ]);
    }

    /**
     * Logika untuk memproses pencarian (search) data Wisata.
     */
    public function search(Request $request)
    {
        // 1. Ambil keyword dari input form (name="keyword" di HTML)
        $keyword = $request->input('keyword'); 

        // 2. Lakukan query database menggunakan Model (LOGIKA PENTING)
        $data_wisata = Wisata::where('nama', 'like', '%' . $keyword . '%')
                               ->orWhere('lokasi', 'like', '%' . $keyword . '%')
                               ->get();

        // 3. Kembalikan view yang sama, tapi dengan hasil yang sudah difilter
        return view('kelola_wisata', [
            'wisatas' => $data_wisata,
            'keyword' => $keyword // Mengirim keyword untuk ditampilkan kembali di input
        ]);
    }
}