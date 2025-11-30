<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /* ------------------------------------------------------------
        WISATAWAN — lihat penilaian dirinya
    -------------------------------------------------------------*/
    public function index()
    {
        $reviews = Review::where('user_id', Auth::id())->get();
        return view('index_wisatawan', compact('reviews'));
    }

    /* ------------------------------------------------------------
        WISATAWAN — buat penilaian
    -------------------------------------------------------------*/
    public function create()
    {
        return view('create_wisatawan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string'
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Penilaian berhasil dikirim!');
    }


    /* ------------------------------------------------------------
        ADMIN — lihat semua review
    -------------------------------------------------------------*/
    public function adminIndex()
    {
        $reviews = Review::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.reviews.index_admin', compact('reviews'));
    }

    /* ------------------------------------------------------------
        ADMIN — edit review
    -------------------------------------------------------------*/
    public function adminEdit($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.reviews.edit_admin', compact('review'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string'
        ]);

        $review = Review::findOrFail($id);

        $review->update([
            'rating' => $request->rating,
            'komentar' => $request->komentar
        ]);

        return redirect()->route('admin.reviews.index')->with('success', 'Penilaian berhasil diperbarui!');
    }

    /* ------------------------------------------------------------
        ADMIN — delete
    -------------------------------------------------------------*/
    public function adminDestroy($id)
    {
        Review::destroy($id);
        return redirect()->route('admin.reviews.index')->with('success', 'Penilaian berhasil dihapus!');
    }
}
