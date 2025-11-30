@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Penilaian</h2>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <label>Rating (1–5)</label>
        <input type="number" name="rating" class="form-control" min="1" max="5" required>

        <label>Komentar</label>
        <textarea name="komentar" class="form-control" required></textarea>

        <button class="btn btn-success mt-3">Kirim</button>
    </form>
</div>
@endsection
