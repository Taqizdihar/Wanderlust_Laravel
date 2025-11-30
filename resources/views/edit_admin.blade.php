@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Penilaian</h2>

    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
        @csrf @method('PUT')

        <label>Rating (1–5)</label>
        <input type="number" name="rating" class="form-control" min="1" max="5"
               value="{{ $review->rating }}" required>

        <label>Komentar</label>
        <textarea name="komentar" class="form-control" required>{{ $review->komentar }}</textarea>

        <button class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
