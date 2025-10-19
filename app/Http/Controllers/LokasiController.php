<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        // Data lokasi wisata disimpan dalam array (simulasi)
        $lokasi = [
            ['id' => 1, 'nama' => 'Pantai Kuta', 'kota' => 'Bali'],
            ['id' => 2, 'nama' => 'Candi Borobudur', 'kota' => 'Magelang'],
            ['id' => 3, 'nama' => 'Gunung Bromo', 'kota' => 'Probolinggo'],
            ['id' => 4, 'nama' => 'Danau Toba', 'kota' => 'Sumatera Utara'],
            ['id' => 5, 'nama' => 'Raja Ampat', 'kota' => 'Papua Barat'],
        ];

        return view('lokasi', compact('lokasi'));
    }
}
