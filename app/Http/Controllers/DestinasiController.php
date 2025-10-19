<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        // Data dummy (tanpa database)
        $destinasi = [
            [
                'id' => 1,
                'nama' => 'Pantai Indah',
                'lokasi' => 'Bali',
                'rating' => 4.8,
                'foto' => 'pantai1.jpg'
            ],
            [
                'id' => 2,
                'nama' => 'Gunung Sejuk',
                'lokasi' => 'Bandung',
                'rating' => 4.6,
                'foto' => 'gunung1.jpg'
            ],
            [
                'id' => 3,
                'nama' => 'Danau Tenang',
                'lokasi' => 'Sumatera Utara',
                'rating' => 4.7,
                'foto' => 'danau1.jpg'
            ],
        ];

        return view('destinasi', compact('destinasi'));
    }
}
