@extends('layout')

@section('title', 'Edit Review')

@section('content')

<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<h2 class="page-title">Edit Review</h2>

<form action="{{ route('reviews.update', $review->id) }}" method="POST" class="review-form">
    @csrf
    @method('PUT')

    <label>Rating (1-5)</label>
    <input type="number" name="rating" min="1" max="5" value="{{ $review->rating }}" required>

    <label>Komentar</label>
    <textarea name="komentar">{{ $review->komentar }}</textarea>

    <button class="btn-submit">Update</button>
</form>

@endsection
