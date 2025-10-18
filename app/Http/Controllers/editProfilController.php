<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editProfilController extends Controller
{
    
    public function index()
    {
        $profil = [
            'nama' => 'Faiz Syafiq Nabily',
            'email' => 'faiz@gmail.com',
            'telepon' => '08123456789',
            'alamat' => 'Ciamis, Jawa Barat'
        ];

        if (session('profil_baru')) {
            $profil = session('profil_baru');
        }

        return view('editProfil', ['profil' => $profil]);
    }

    public function update(Request $request)
    {
        $profilBaru = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'telepon' => $request->input('telepon'),
            'alamat' => $request->input('alamat'),
        ];

        session()->flash('success', 'Profil berhasil diperbarui!');
        session(['profil_baru' => $profilBaru]);

        return redirect('/editProfil');
    }
}