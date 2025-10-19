<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function show($id)
    {
        // Contoh data dummy (tanpa database)
        $profile = [
            'user_id' => 1,
            'nama' => 'Riska',
        ];

        // Data lokasi berdasarkan id
        $dataLokasi = [
            'tempatwisata_id' => $id,
            'nama_lokasi' => 'Pantai Indah',
            'jenis_wisata' => 'Wisata Alam',
            'waktu_buka' => '08:00',
            'waktu_tutup' => '17:00',
            'deskripsi' => 'Pantai indah dengan pasir putih dan ombak tenang.',
            'nomor_pic' => 'PIC-00987',
            'surat_izin' => 'surat_izin.pdf',
            'status' => 'pending',
        ];

        // Contoh foto (bisa kamu sesuaikan)
        $fotos = [
            'foto1.jpg',
            'foto2.jpg',
            'foto3.jpg',
        ];

        // Kirim data ke view
        return view('lokasiDetail', compact('profile', 'dataLokasi', 'fotos'));
    }
}
