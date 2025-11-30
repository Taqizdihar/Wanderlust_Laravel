<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'destinasi'])->get();
        return view('index', compact('reviews'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
            'destinasi_id' => 'required',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'destinasi_id' => $request->destinasi_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        $data = [
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ];

        Review::findOrFail($id)->update($data);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return back()->with('success', 'Review berhasil dihapus!');
    }
}
