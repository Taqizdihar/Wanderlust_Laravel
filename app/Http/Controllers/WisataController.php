<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::latest()->get();
        return view('wisata_index', compact('wisatas'));
    }

    public function create()
    {
        return view('wisatacreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga_tiket' => 'required|numeric',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['nama', 'deskripsi', 'harga_tiket']);

        if ($request->hasFile('foto')) {
            $namaFile = time() . '_' . $request->foto->getClientOriginalName();
            $request->foto->move('uploads/wisata', $namaFile);
            $data['foto'] = $namaFile;
        }

        Wisata::create($data);

        return redirect()->route('admin.wisata.index')
            ->with('success', 'Wisata berhasil ditambahkan.');
    }

    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('wisata_show', compact('wisata'));
    }

    public function verifikasi($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->update(['status' => 'Selesai']);

        return back()->with('success', 'Wisata berhasil diverifikasi.');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);

        if ($wisata->foto) {
            @unlink('uploads/wisata/' . $wisata->foto);
        }

        $wisata->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
