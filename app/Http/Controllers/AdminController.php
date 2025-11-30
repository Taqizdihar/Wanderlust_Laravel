<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // View-nya 'admin_dashboard' (seperti yang kita desain sebelumnya)
        return view('admin_dashboard');
    }

    // Method ini tidak kita gunakan lagi, karena sudah ada AdminWisataController
    public function kelolaWisata(Request $request)
    {
        $keyword = $request->get('keyword'); 
        $wisatas = []; 
        
        // Asumsi: View ini akan dihapus/diganti resource route
        return view('wisata_index', compact('wisatas'));
    }

    // Method kelolaUser() HARUS DIHAPUS KARENA SUDAH PINDAH KE ADMINUSERCONTROLLER
    // public function kelolaUser()
    // {
    //     return view('user_index'); 
    // }

    public function kelolaKeuangan()
    {
        // View-nya 'keuangan_index'
        return view('keuangan_index'); 
    }
}