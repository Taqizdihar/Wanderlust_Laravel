<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Halaman Dashboard
    public function dashboard()
    {
        // Logika pengambilan data statistik/chart akan diletakkan di sini
        return view('dashboard');
    }

    // Halaman Kelola Wisata (index dan search)
    public function kelolaWisata(Request $request)
    {
        // Ambil keyword dari URL (jika ada)
        $keyword = $request->get('keyword'); 

        // LOGIKA PENCARIAN & PENGAMBILAN DATA AKAN DIMULAI DI SINI
        $wisatas = []; 
        
        return view('wisata_index', compact('wisatas', 'keyword'));
    }

    // Halaman Kelola User
    public function kelolaUser()
    {
        // View 'user_index' perlu kamu buat nanti
        return view('user_index'); 
    }

    // Halaman Kelola Keuangan
    public function kelolaKeuangan()
    {
        // View 'keuangan_index' perlu kamu buat nanti
        return view('keuangan_index'); 
    }
}