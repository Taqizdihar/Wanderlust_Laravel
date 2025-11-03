<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfilController extends Controller
{
    public function show(Request $request)
    {
        $profil = $request->session()->get('profil', [
            'nama' => '',
            'email' => '',
            'telepon' => '',
            'alamat' => '',
            'tanggal_lahir' => '',
            'jenis_kelamin' => '',
            'pekerjaan' => '',
            'bio' => '',
            'foto' => 'foto_profil.jpg',
        ]);

        return view('editProfil', compact('profil'));

        public function update(Request $request)
        {
            $data = $request-session->validate([
                'nama' => 'required|string|max:100',
                'email' => 'required|email',
                'telepon' => 'nullable|string|max: 20',
                'alamat' => 'nullable|string|max: 200'
                'tanggal_lahir' =>
                'jenis_kelamin' =>
                'pekerjaan' =>
                'bio' =>
                'foto' =>
            ]
            ])
                

        }
    }


}