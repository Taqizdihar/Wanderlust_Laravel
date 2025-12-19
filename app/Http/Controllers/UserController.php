<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator; // Digunakan untuk Pagination Data Dummy
use Illuminate\Routing\Controller; // Pastikan ini ter-import atau di-extend dengan benar

class UserController extends Controller
{
    /**
     * Menampilkan daftar pengguna (Kelola User) dengan pagination.
     * Menggunakan data database, atau fallback ke 20 list data dummy jika error DB.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $users = User::orderBy('id', 'desc')->paginate(20);
            
        } catch (\Exception $e) {
            $users = $this->generateDummyUsers();
    
        }

        // 3. Kirim variabel $users ke View 'kelola_user'
        return view('kelola_user', compact('users')); 
    }

    /**
     * Menghapus user tertentu dari database (Soft Delete).
     *
     * @param int $id ID user yang akan dihapus.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Cari user berdasarkan ID, jika tidak ketemu akan otomatis throw 404
        $user = User::findOrFail($id);
        
        // Hapus user (Soft Delete, kolom deleted_at akan terisi)
        $user->delete();

        // Redirect kembali ke halaman Kelola User dengan pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }

    /**
     * Helper Function: Membuat 20 list data dummy (FALLBACK) untuk mencegah error pada View.
     * Data ini hanya digunakan JIKA database gagal diakses.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    private function generateDummyUsers()
    {
        $dummyData = [];
        for ($i = 1; $i <= 20; $i++) {
            // Menggunakan (object) agar data dummy memiliki properti seperti objek Model
            $dummyData[] = (object) [
                'id' => $i,
                'name' => 'User Dummy ' . $i,
                'is_active' => ($i % 3 != 0), // Status Aktif (true) atau Non Aktif (false)
            ];
        }
        
        // Membuat Pagination manual untuk data dummy (selalu di halaman 1)
        return new LengthAwarePaginator(
            $dummyData, 
            count($dummyData), 
            20, // Per halaman
            1,  // Halaman saat ini
            ['path' => route('admin.user.index')]
        );
    }
}