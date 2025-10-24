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
            'foto' => 'default.png',
        ]);

        return view('editProfil', compact('profil'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|string',
            'pekerjaan' => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:500',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $namaFile = time() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('images'), $namaFile);
            $data['foto'] = $namaFile;
        } else {
            $data['foto'] = $request->session()->get('foto', 'foto_profil.jpg');
        }

        $request->session()->put('profil', $data);

        return redirect()->route('edit-profil')->with('success', 'Profil berhasil diperbarui!');
    }
}
