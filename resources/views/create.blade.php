@extends('layout')

@section('title', 'Tambah Review')

@section('content')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<h1 class="page-title">Tambah Penilaian</h1>

<form action="{{ route('reviews.store') }}" method="POST" class="review-form">
    @csrf

    <label>User</label>
    <select name="user_id" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->nama }}</option>
        @endforeach
    </select>

    <label>Destinasi</label>
    <select name="destinasi_id" required>
        @foreach ($destinasi as $d)
            <option value="{{ $d->id }}">{{ $d->nama }}</option>
        @endforeach
    </select>

    <label>Rating</label>
    <input type="number" name="rating" max="5" min="1" required>

    <label>Komentar</label>
    <textarea name="komentar" required></textarea>

    <button class="btn-submit">Simpan</button>
</form>
@endsection
