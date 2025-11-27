<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PaketWisata; // Untuk mengambil detail paket harga
use App\Models\Transaksi; // Model Transaksi Anda

class PesanTiketController extends Controller
{
    /**
     * Menampilkan formulir pemesanan untuk paket wisata tertentu.
     */
    public function showForm($idPaket)
    {
        // Pastikan pengguna login sebelum memesan
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk memesan tiket.');
        }

        // Ambil detail paket harga (PaketWisata)
        $paket = PaketWisata::findOrFail($idPaket);
        
        // Kirim data paket ke view pemesanan
        return view('pemesanan', compact('paket'));
    }

    /**
     * Memproses dan menyimpan transaksi pemesanan.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'id_paket' => 'required|exists:paket_wisatas,id_paket',
            'jumlah_tiket' => 'required|integer|min:1',
            // ... validasi data pemesan lainnya
        ]);

        $paket = PaketWisata::findOrFail($request->id_paket);
        $totalHarga = $paket->harga * $request->jumlah_tiket;

        // 2. Buat Transaksi
        try {
            // Asumsi Anda memiliki Model Transaksi
            Transaksi::create([
                'id_wisatawan' => Auth::user()->id_wisatawan, // ID user yang memesan
                'id_paket' => $request->id_paket,
                'jumlah_tiket' => $request->jumlah_tiket,
                'total_harga' => $totalHarga,
                'status_transaksi' => 'pending', // Status awal
                // ... kolom lain
            ]);

            return redirect()->route('transaksi.sukses')->with('success', 'Pemesanan berhasil! Silakan lakukan pembayaran.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memproses pemesanan.');
        }
    }
}