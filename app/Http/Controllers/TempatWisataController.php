<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempatWisataController extends Controller
{
    public function show()
    {
        // Simulasi data profil (nggak pake login)
        $profile = [
            'nama' => 'Riska Bakri',
            'email' => 'riska@example.com'
        ];

        // Simulasi data lokasi
        $dataLokasiList = [
            [
                'nama' => 'Gunung Bromo',
                'lokasi' => 'Jawa Timur',
                'rating' => 4.8
            ],
            [
                'nama' => 'Raja Ampat',
                'lokasi' => 'Papua Barat',
                'rating' => 4.9
            ],
            [
                'nama' => 'Tanah Lot',
                'lokasi' => 'Bali',
                'rating' => 4.7
            ]
        ];

        return view('lokasi', compact('profile', 'dataLokasiList'));
    }
}
