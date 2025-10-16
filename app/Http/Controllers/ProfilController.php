<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit()
    {
        $user = [
            'nama' => 'Faiz Syafiq Nabily',
            'email' => 'faiz@gmail.com',
            'telepon' => '081234567890',
            'tanggal_lahir' => '2005-04-04',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Merdeka No. 45, Bandung',
            'foto' => 'faiz.jpg'
        ];

        return view('editProfil', compact('user'));
    }

    public function update(Request $request)
    {
       
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}