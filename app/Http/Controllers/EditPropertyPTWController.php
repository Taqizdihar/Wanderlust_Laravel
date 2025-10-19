<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditPropertyPTWController extends Controller
{
    public function edit($id)
    {
        // Data pemilik (dummy)
        $owner = [
            'name' => 'M. Alnilam Lambda',
            'title' => 'Minister of Tourism',
            'photo' => 'images/owner.jpg',
        ];

        // Data property (sementara contoh array tunggal)
        $property = [
            'id' => $id,
            'name' => 'The Fairy Tale Land',
            'category' => 'Nature',
            'address' => 'Jl. Wonderland No. 1, Bandung',
            'open_time' => '08:00',
            'close_time' => '20:00',
            'description' => 'Taman wisata penuh warna dan fantasi yang cocok untuk keluarga.',
            'image' => 'images/fairy-tale-land.jpg'
        ];

        return view('editPropertyPTW', compact('owner', 'property'));
    }

    public function update(Request $request, $id)
    {
        // Nanti logika update ditambahkan di sini
        return redirect()->route('properties.ptw');
    }

    public function destroy($id)
    {
        // Nanti logika hapus data ditambahkan di sini
        return redirect()->route('properties.ptw');
    }
}
