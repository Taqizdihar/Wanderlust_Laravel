<?php
// app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * R (Read) - Menampilkan daftar user, termasuk fungsi search.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');

        // Logika SEARCH: Mencari berdasarkan Nama, Email, Role, atau STATUS
        $users = User::when($keyword, function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                      ->orWhere('email', 'like', '%' . $keyword . '%')
                      ->orWhere('role', 'like', '%' . $keyword . '%')
                      ->orWhere('status', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10); 

        return view('user_index', compact('users', 'keyword'));
    }

    /**
     * U (Update) - Menampilkan form edit user.
     */
    public function edit(User $user)
    {
        return view('user_edit', compact('user'));
    }

    /**
     * U (Update) - Memproses data update user.
     */
    public function update(Request $request, User $user)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
            'status' => 'required|in:aktif,nonaktif', // Validasi Status
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status; // Simpan Status

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Data User berhasil diperbarui!');
    }
    
    /**
     * U (Update) - Mengubah status user secara cepat (toggle).
     */
    public function toggleStatus(User $user)
    {
        // Tentukan status baru (Aktif -> Nonaktif, Nonaktif -> Aktif)
        $newStatus = $user->status === 'aktif' ? 'nonaktif' : 'aktif';
        
        $user->status = $newStatus;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Status user ' . $user->name . ' berhasil diubah menjadi ' . strtoupper($newStatus) . '.');
    }


    /**
     * D (Delete) - Menghapus user.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}