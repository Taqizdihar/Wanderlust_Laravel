<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Storage; // PASTIKAN INI ADA
use Carbon\Carbon; // PASTIKAN INI ADA

class editProfilController extends Controller
{
    // ... (Metode show() Anda tetap sama)

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
            'nama' => 'required|string|max:255', // Wajib: Update di tabel users
            'email' => 'required|email|max:255|unique:users,email,' . $user->id_user . ',id_user', // Wajib: Update di tabel users, unik kecuali user sendiri
            'no_telepon' => 'nullable|string|max:15',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => ['nullable', Rule::in(['L', 'P'])], 
            'kota_asal' => 'nullable|string|max:255',
            'preferensi_wisata' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Untuk validasi upload file
        ]);

        // 3. Memulai Transaksi Database
        try {
            DB::beginTransaction();

            // --- Data untuk Tabel 'users' ---
            $dataToUpdateUser = [
                'nama' => $request->nama,
                'email' => $request->email,
            ];

            // --- Logika Upload Foto Profil BARU ---
            if ($request->hasFile('foto_profil')) {
                $image = $request->file('foto_profil');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                // Hapus foto profil lama jika ada dan bukan 'default.png'
                if ($user->foto_profil && $user->foto_profil !== 'default.png' && Storage::disk('public')->exists('images/profiles/' . $user->foto_profil)) {
                    Storage::disk('public')->delete('images/profiles/' . $user->foto_profil);
                }
                
                // Simpan foto baru
                $image->storeAs('images/profiles', $imageName, 'public');
                $dataToUpdateUser['foto_profil'] = $imageName; // Tambahkan nama file baru ke data user
            }
            // ----------------------------------------
            
            // 4. Update Database
            $user->update($dataToUpdateUser); // PENTING: Update data users

            // --- Data untuk Tabel 'wisatawan' ---
            if ($wisatawan) {
                $dataToUpdateWisatawan = [
                    'no_telepon' => $request->no_telepon,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin, 
                    'kota_asal' => $request->kota_asal,
                    'preferensi_wisata' => $request->preferensi_wisata,
                    'alamat' => $request->alamat,
                ];
                $wisatawan->update($dataToUpdateWisatawan); // Update data wisatawan
            }
            
            DB::commit();

            // 5. Redirect dan Tampilkan Pesan Sukses
            return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();

            // 6. Redirect dan Tampilkan Pesan Error (sangat membantu untuk debugging!)
            return redirect()->route('edit-profil')->with('error', 'Gagal memperbarui profil. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }
}