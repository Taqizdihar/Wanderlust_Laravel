<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TempatWisataController extends Controller
{
    public function show($id)
    {
        $userId = Auth::id(); // ambil ID user dari session login Laravel

        $profile = DB::table('user')->where('user_id', $userId)->first();
        $dataLokasi = DB::table('tempatwisata')->where('tempatwisata_id', $id)->first();

        $fotos = DB::table('fotowisata')
            ->where('tempatwisata_id', $id)
            ->orderBy('urutan')
            ->pluck('link_foto');

        return view('lokasi.detail', compact('profile', 'dataLokasi', 'fotos'));
    }
}
