<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $destinasi = [
            ['nama' => 'Pantai Pangandaran', 'lokasi' => 'Ciamis', 'rating' => 4.7],
            ['nama' => 'Situ Lengkong Panjalu', 'lokasi' => 'Panjalu', 'rating' => 4.5],
            ['nama' => 'Green Canyon', 'lokasi' => 'Cijulang', 'rating' => 4.8],
            ['nama' => 'Curug Tujuh Cibolang', 'lokasi' => 'Panjalu', 'rating' => 4.6],
            ['nama' => 'Pantai Batu Hiu', 'lokasi' => 'Parigi', 'rating' => 4.4],
            ['nama' => 'Pantai Karapyak', 'lokasi' => 'Kalipucang', 'rating' => 4.3],
            ['nama' => 'Bukit Panenjoan', 'lokasi' => 'Cidolog', 'rating' => 4.5],
            ['nama' => 'Kampung Adat Kuta', 'lokasi' => 'Tambaksari', 'rating' => 4.6],
        ];

        return view('home', ['destinasi' => $destinasi]);
    }
}
