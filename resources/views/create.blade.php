@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Buat Penilaian</h2>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Rating (1–5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label>Komentar</label>
            <textarea name="komentar" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim</button>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
