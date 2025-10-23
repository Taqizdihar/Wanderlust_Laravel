<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        $kataKunci = $request->query('kataKunci', '');

        // Contoh array data tempat wisata (pengganti database)
        $dataTempatWisata = [
            [
                'tempatwisata_id' => 1,
                'nama_lokasi' => 'Pantai Parangtritis',
                'deskripsi' => 'Pantai populer di Yogyakarta dengan pemandangan indah.',
                'sumir' => 'Pantai yang sangat terkenal di selatan Yogyakarta.',
                'link_foto' => 'parangtritis.jpg'
            ],
            [
                'tempatwisata_id' => 2,
                'nama_lokasi' => 'Candi Borobudur',
                'deskripsi' => 'Candi Buddha terbesar di dunia.',
                'sumir' => 'Situs bersejarah dunia yang menakjubkan.',
                'link_foto' => 'borobudur.jpg'
            ],
            [
                'tempatwisata_id' => 3,
                'nama_lokasi' => 'Gunung Bromo',
                'deskripsi' => 'Gunung berapi aktif di Jawa Timur.',
                'sumir' => 'Wisata alam dan sunrise terbaik di Indonesia.',
                'link_foto' => 'bromo.jpg'
            ],
        ];

        // Filter hasil pencarian berdasarkan kata kunci
        $hasilPencarian = array_filter($dataTempatWisata, function ($item) use ($kataKunci) {
            return stripos($item['nama_lokasi'], $kataKunci) !== false ||
                   stripos($item['deskripsi'], $kataKunci) !== false ||
                   stripos($item['sumir'], $kataKunci) !== false;
        });

        return view('pencarian', [
            'kataKunci' => $kataKunci,
            'hasilPencarian' => $hasilPencarian
        ]);
    }
}