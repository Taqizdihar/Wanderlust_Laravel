<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $users = User::when($keyword, function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%")
                      ->orWhere('email', 'LIKE', "%$keyword%")
                      ->orWhere('status', 'LIKE', "%$keyword%");
            })
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return view('user_index', compact('users'));
    }

    public function updateStatus($id)
    {
        $user = User::findOrFail($id);

        // toggle aktif / nonaktif
        $user->status = $user->status === 'aktif' ? 'nonaktif' : 'aktif';
        $user->save();

        return redirect()->back()->with('success', 'Status user berhasil diupdate!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
