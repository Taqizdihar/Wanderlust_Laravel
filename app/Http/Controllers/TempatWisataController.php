<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempatWisataController extends Controller
{
    public function show($id)
    {
        // Simulasi user login
        $profile = [
            'user_id' => 1,
            'nama' => 'Riska Bakri',
            'email' => 'riska@example.com',
        ];

        // Simulasi data lokasi
        $dataLokasiList = [
            1 => [
                'tempatwisata_id' => 1,
                'nama_lokasi' => 'Pantai Indah',
                'jenis_wisata' => 'Wisata Alam',
                'waktu_buka' => '08:00',
                'waktu_tutup' => '17:00',
                'deskripsi' => 'Pantai dengan pasir putih dan air jernih, cocok untuk liburan keluarga.',
                'nomor_pic' => 'PIC12345',
                'surat_izin' => 'izin_pantai.pdf',
                'status' => 'pending',
            ],
            2 => [
                'tempatwisata_id' => 2,
                'nama_lokasi' => 'Gunung Merdeka',
                'jenis_wisata' => 'Pendakian',
                'waktu_buka' => '06:00',
                'waktu_tutup' => '18:00',
                'deskripsi' => 'Gunung dengan jalur pendakian ramah pemula dan pemandangan indah.',
                'nomor_pic' => 'PIC67890',
                'surat_izin' => 'izin_gunung.pdf',
                'status' => 'active',
            ],
        ];

        // Simulasi foto
        $fotoList = [
            1 => [
                'foto1.jpg',
                'foto2.jpg',
                'foto3.jpg'
            ],
            2 => [
                'gunung1.jpg',
                'gunung2.jpg'
            ]
        ];

        // Ambil data berdasarkan id
        $dataLokasi = $dataLokasiList[$id] ?? null;
        $fotos = $fotoList[$id] ?? [];

        if (!$dataLokasi) {
            abort(404, 'Lokasi tidak ditemukan');
        }

        return view('lokasi.detail', compact('profile', 'dataLokasi', 'fotos'));
    }
}
