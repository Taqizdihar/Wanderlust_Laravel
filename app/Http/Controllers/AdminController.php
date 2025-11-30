<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // View-nya berubah menjadi 'dashboard'
        return view('dashboard');
    }

    public function kelolaWisata(Request $request)
    {
        $keyword = $request->get('keyword'); 
        $wisatas = []; 
        
        // View-nya berubah menjadi 'wisata_index'
        return view('wisata_index', compact('wisatas'));
    }

    public function kelolaUser()
    {
        // View-nya berubah menjadi 'user_index' (asumsi)
        return view('user_index'); 
    }

    public function kelolaKeuangan()
    {
        // View-nya berubah menjadi 'keuangan_index' (asumsi)
        return view('keuangan_index'); 
    }
}