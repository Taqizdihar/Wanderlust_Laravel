<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destinasi = [
            ['nama' => 'Bali', 'lokasi' => 'Bali, Indonesia', 'rating' => 4.9],
            ['nama' => 'Yogyakarta', 'lokasi' => 'Yogyakarta, Indonesia', 'rating' => 4.8],
            ['nama' => 'Lombok', 'lokasi' => 'Nusa Tenggara Barat, Indonesia', 'rating' => 4.7],
        ];

        return view('home', compact('destinasi'));
    }
}