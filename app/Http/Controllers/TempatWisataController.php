<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TempatWisataController extends Controller
{
    public function show($id_lokasi)
    {
        // Ambil ID user dari session
        $userId = Session::get('user_id');

        // Ambil data user
        $profile = DB::table('user')->where('user_id', $userId)->first();

        // Ambil data tempat wisata
        $dataLokasi = DB::table('tempatwisata')->where('tempatwisata_id', $id_lokasi)->first();

        // Ambil data foto wisata
        $fotos = DB::table('fotowisata')
            ->where('tempatwisata_id', $id_lokasi)
            ->orderBy('urutan')
            ->pluck('link_foto');

        // Kirim data ke view
        return view('admin.properti-detail', [
            'profile' => $profile,
            'dataLokasi' => $dataLokasi,
            'fotos' => $fotos,
        ]);
    }
}
