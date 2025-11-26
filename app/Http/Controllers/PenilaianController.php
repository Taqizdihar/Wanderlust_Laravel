<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\TempatWisata;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    /**
     * Menyimpan penilaian baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Pastikan pengguna sudah login
        if (!Auth::check()) {
            return back()->with('error', 'Anda harus login untuk memberikan penilaian.');
        }

        // 2. Validasi data input
        $request->validate([
            'id_tempat' => 'required|exists:tempat_wisatas,id_tempat',
            'penilaian' => 'required|integer|min:1|max:5', // Kolom 'penilaian' adalah rating (1-5)
            'ulasan' => 'nullable|string|max:1000',
            // Tambahkan validasi lain sesuai kebutuhan (judul_ulasan, foto_ulasan)
        ]);
        
        // 3. Simpan Penilaian
        try {
            Penilaian::create([
                'id_wisatawan' => Auth::user()->id_wisatawan, // Asumsi user memiliki kolom id_wisatawan
                'id_tempat' => $request->id_tempat,
                'penilaian' => $request->penilaian,
                'ulasan' => $request->ulasan,
                // 'tanggal_penilaian' otomatis diisi
                // 'status_penilaian' default 'pending'
            ]);

            return back()->with('success', 'Penilaian Anda berhasil disimpan dan akan segera ditinjau.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan penilaian. Error: ' . $e->getMessage());
        }
    }
}