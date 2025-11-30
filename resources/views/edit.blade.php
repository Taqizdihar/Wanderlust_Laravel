@extends('layout')

@section('title', 'Edit Review')

@section('content')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<h1 class="page-title">Edit Penilaian</h1>

<form action="{{ route('reviews.update', $review->id) }}" method="POST" class="review-form">
    @csrf
    @method('PUT')

    <label>User</label>
    <input type="text" value="{{ $review->user->nama }}" disabled>

    <label>Destinasi</label>
    <input type="text" value="{{ $review->destinasi->nama }}" disabled>

    <label>Rating</label>
    <input type="number" name="rating" max="5" min="1" value="{{ $review->rating }}" required>

    <label>Komentar</label>
    <textarea name="komentar" required>{{ $review->komentar }}</textarea>

    <button class="btn-submit">Update</button>
</form>
@endsection
