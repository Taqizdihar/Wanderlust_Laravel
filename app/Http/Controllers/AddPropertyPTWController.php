<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddPropertyPTWController extends Controller
{
    public function index()
    {
        $owner = [
            'name' => 'M. Alnilam Lambda',
            'title' => 'Minister of Tourism',
            'photo' => 'images/owner.jpg',
        ];

        return view('addPropertyPTW', compact('owner'));
    }

    public function store(Request $request)
    {
        // Sementara: belum menyimpan ke array/database
        // Nanti di sini kita tambahkan logika validasi & simpan

        // Kembali ke halaman properties
        return redirect()->route('properties.ptw');
    }
}
