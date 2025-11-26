<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark; // Import Model Bookmark
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Menambahkan atau menghapus (toggle) destinasi dari daftar bookmark pengguna.
     */
    public function toggle($idTempat)
    {
        // 1. Pastikan pengguna sudah login
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }
        
        // Ambil ID Wisatawan yang sedang login
        $wisatawanId = Auth::user()->id_wisatawan;
        
        // Cari apakah bookmark sudah ada
        $bookmark = Bookmark::where('id_wisatawan', $wisatawanId)
                            ->where('id_tempat', $idTempat)
                            ->first();

        if ($bookmark) {
            // Jika sudah ada, hapus (Unbookmark)
            $bookmark->delete();
            $action = 'removed';
            $message = 'Destinasi dihapus dari favorit.';
        } else {
            // Jika belum ada, tambahkan (Bookmark)
            Bookmark::create([
                'id_wisatawan' => $wisatawanId,
                'id_tempat' => $idTempat,
                // Kolom lain (tanggal_simpan, dll.) akan diisi otomatis jika diatur di Model/Migration
            ]);
            $action = 'added';
            $message = 'Destinasi ditambahkan ke favorit.';
        }

        return response()->json([
            'success' => true,
            'action' => $action,
            'message' => $message
        ]);
    }
}