<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiController extends Controller
{
    public function show($id)
    {
        // Simulasi data pengguna (user)
        $profile = [
            'user_id' => 1,
            'nama' => 'Riska Dhea',
            'role' => 'admin'
        ];

        // Simulasi data tempat wisata
        $tempatWisata = [
            1 => [
                'tempatwisata_id' => 1,
                'nama_lokasi' => 'Pantai Kuta',
                'jenis_wisata' => 'Pantai',
                'waktu_buka' => '07:00',
                'waktu_tutup' => '18:00',
                'deskripsi' => 'Pantai indah dengan pasir putih dan ombak besar.',
                'nomor_pic' => 'PIC12345',
                'surat_izin' => 'izin_kuta.pdf',
                'status' => 'pending'
            ],
            2 => [
                'tempatwisata_id' => 2,
                'nama_lokasi' => 'Candi Borobudur',
                'jenis_wisata' => 'Candi',
                'waktu_buka' => '06:00',
                'waktu_tutup' => '17:00',
                'deskripsi' => 'Candi peninggalan sejarah terbesar di dunia.',
                'nomor_pic' => 'PIC67890',
                'surat_izin' => 'izin_borobudur.pdf',
                'status' => 'active'
            ],
        ];

        // Simulasi foto-foto
        $fotoWisata = [
            1 => [
                'foto1.jpg',
                'foto2.jpg',
                'foto3.jpg'
            ],
            2 => [
                'borobudur1.jpg',
                'borobudur2.jpg',
            ],
        ];

        // Ambil data berdasarkan id dari URL
        $dataLokasi = $tempatWisata[$id] ?? null;
        $fotos = $fotoWisata[$id] ?? [];

        if (!$dataLokasi) {
            abort(404, 'Data lokasi tidak ditemukan');
        }

        return view('properti.show', compact('profile', 'dataLokasi', 'fotos', 'id'));
    }
}
