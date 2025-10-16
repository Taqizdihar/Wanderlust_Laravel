<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destinasi = [
            [
                'id' => 1,
                'nama' => 'Bali',
                'deskripsi' => 'Pulau dewata dengan pantai indah dan budaya unik.',
                'gambar' => 'bali.jpg',
                'rating' => 4.9,
                'lokasi' => 'Bali, Indonesia'
            ],
            [
                'id' => 2,
                'nama' => 'Yogyakarta',
                'deskripsi' => 'Kota budaya dengan Candi Borobudur dan Keraton.',
                'gambar' => 'yogyakarta.jpg',
                'rating' => 4.8,
                'lokasi' => 'Yogyakarta, Indonesia'
            ],
            [
                'id' => 3,
                'nama' => 'Lombok',
                'deskripsi' => 'Pulau tropis dengan Gunung Rinjani dan pantai eksotis.',
                'gambar' => 'lombok.jpg',
                'rating' => 4.7,
                'lokasi' => 'Nusa Tenggara Barat, Indonesia'
            ]
        ];

        return view('home', compact('destinasi'));
    }
}