<?php

namespace App\Http\Controllers;

use App\Models\TempatWisata;
use App\Models\Penilaian; // Perlu diimpor untuk menghitung rating
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DestinasiController extends Controller
{
    // METHOD INDEX (DARI FILE ANDA - UNTUK DAFTAR SEMUA DESTINASI)
    public function index()
    {
        // Ambil semua destinasi dengan paginasi
        $semuaDestinasi = TempatWisata::with(['fotoTempatWisatas', 'penilaians'])
            ->orderBy('nama_tempat', 'asc')
            ->paginate(12);

        // View ini (destinasi.blade.php) perlu Anda buat
        return view('destinasi', compact('semuaDestinasi'));
    }

    // METHOD SHOW (YANG PERLU ANDA TAMBAHKAN - UNTUK DETAIL DESTINASI)
    public function show($id_tempat)
    {
        // 1. Ambil Destinasi dengan relasi Foto, Pemilik, dan Paket
        $destinasi = TempatWisata::with(['pemilikTempatWisata', 'fotoTempatWisatas', 'paketWisatas'])
                                 ->findOrFail($id_tempat);

        // 2. Ambil Rating & Total Reviews
        $ratingData = Penilaian::where('id_tempat', $id_tempat)
                                ->where('status_penilaian', 'disetujui')
                                ->selectRaw('AVG(penilaian) as avg_rating, COUNT(id_penilaian) as total_reviews')
                                ->first();
        
        $avg_rating = round($ratingData->avg_rating ?? 0, 1);
        $total_reviews = $ratingData->total_reviews ?? 0;

        // 3. Ambil Penilaian/Ulasan (Termasuk nama pengulas)
        $penilaians = Penilaian::where('penilaians.id_tempat', $id_tempat)
                        ->where('penilaians.status_penilaian', 'disetujui')
                        // 1. Perbaikan Nama Tabel
                        ->join('wisatawan', 'penilaians.id_wisatawan', '=', 'wisatawan.id_wisatawan')
                        // 2. Perbaikan Nama Kolom Primary Key di Tabel Users
                        ->join('users', 'wisatawan.id_user', '=', 'users.id_user')
                        ->select('penilaians.*', 'users.nama as nama_pengulas') 
                        ->orderBy('penilaians.tanggal_penilaian', 'desc')
                        ->get();
        
        return view('detail', compact(
            'destinasi',
            'avg_rating',
            'total_reviews',
            'penilaians'
        ));
    }
}