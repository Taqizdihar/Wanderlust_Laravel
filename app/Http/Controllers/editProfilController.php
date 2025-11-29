<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon; // Diperlukan untuk perhitungan Usia

class editProfilController extends Controller
{
    /**
     * Menampilkan halaman Edit Profil (Form) dengan data yang sudah ada.
     * Dipanggil oleh Route::get('/edit-profil', ... , 'show')
     */
    public function show() 
    {
        // 1. Mendapatkan data user yang sedang login
        $user = Auth::user();

        // 2. Mengambil data Wisatawan (detail profil) melalui relasi
        $wisatawan = $user->wisatawan; 
        
        // --- FIX: Hitung Usia dan siapkan variabel $usia ---
        $usia = null;
        if ($wisatawan && $wisatawan->tanggal_lahir) {
            $birthDate = Carbon::parse($wisatawan->tanggal_lahir);
            // Menggunakan diffInYears() yang akan menghasilkan integer (bilangan bulat)
            $usiaTahun = $birthDate->diffInYears(Carbon::now());
        }
        // ----------------------------------------------------

        // 3. Tampilkan view editProfil dan kirimkan data, termasuk $usia
        return view('editProfil', compact('user', 'wisatawan', 'usia')); 
    }

    /**
     * Menyimpan data yang diubah dari Form Edit Profil ke database.
     * Dipanggil oleh Route::post('/update-profil', ... , 'update')
     */
    public function update(Request $request)
    {
        // 1. Ambil User dan Wisatawan yang sedang login
        $user = Auth::user();
        $wisatawan = $user->wisatawan;

        // 2. Validasi Input
        $request->validate([
            'no_telepon' => 'nullable|string|max:15',
            'tanggal_lahir' => 'nullable|date',
            // Memastikan jenis kelamin hanya L atau P
            'jenis_kelamin' => ['nullable', Rule::in(['L', 'P'])], 
            'kota_asal' => 'nullable|string|max:255',
            'preferensi_wisata' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        // 3. Memulai Transaksi Database (untuk memastikan konsistensi)
        try {
            DB::beginTransaction();

            // --- Update Data di Tabel 'wisatawan' ---
            if ($wisatawan) {
                $wisatawan->update([
                    'no_telepon' => $request->no_telepon,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin, 
                    'kota_asal' => $request->kota_asal,
                    'preferensi_wisata' => $request->preferensi_wisata,
                    'alamat' => $request->alamat,
                ]);
            }
            
            // Catatan: Jika ada data di tabel 'users' yang diubah (misal: nama), update di sini.

            DB::commit();

            // 4. Redirect dan Tampilkan Pesan Sukses
            return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();

            // 5. Redirect dan Tampilkan Pesan Error
            return redirect()->route('edit-profil')->with('error', 'Gagal memperbarui profil. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }
}