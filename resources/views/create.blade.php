@extends('layout')

@section('title','Tambah Review')

@section('content')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<h1 class="page-title">Tambah Penilaian</h1>

<form action="{{ route('reviews.store') }}" method="POST" class="form-review">
    @csrf

    <label>Destinasi</label>
    <select name="destinasi_id">
        @foreach($destinasi as $d)
        <option value="{{ $d->id }}">{{ $d->nama }}</option>
        @endforeach
    </select>

    <label>Rating</label>
    <input type="number" name="rating" min="1" max="5">

    <label>Komentar</label>
    <textarea name="komentar"></textarea>

    <button class="btn-save">Simpan</button>
</form>
@endsection
