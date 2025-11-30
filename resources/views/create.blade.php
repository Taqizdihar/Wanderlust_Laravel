@extends('layout')

@section('title', 'Tambah Review')

@section('content')

<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<h2 class="page-title">Tambah Review Baru</h2>

<form action="{{ route('reviews.store') }}" method="POST" class="review-form">
    @csrf

    <label>Rating (1-5)</label>
    <input type="number" name="rating" min="1" max="5" required>

    <label>Komentar</label>
    <textarea name="komentar"></textarea>

    <label>ID Destinasi</label>
    <input type="text" name="destinasi_id" required>

    <button class="btn-submit">Simpan</button>
</form>

@endsection
