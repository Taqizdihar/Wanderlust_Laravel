@extends('layout')

@section('title','Edit Review')

@section('content')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<h1 class="page-title">Edit Penilaian</h1>

<form action="{{ route('reviews.update', $review->id) }}" method="POST" class="form-review">
    @csrf
    @method('PUT')

    <label>Rating</label>
    <input type="number" name="rating" min="1" max="5" value="{{ $review->rating }}">

    <label>Komentar</label>
    <textarea name="komentar">{{ $review->komentar }}</textarea>

    <button class="btn-save">Update</button>
</form>
@endsection
