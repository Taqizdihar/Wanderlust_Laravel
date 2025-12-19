@extends('layout')

@section('content')

<h2>{{ $wisata->nama }}</h2>

@if ($wisata->foto)
    <img src="/uploads/wisata/{{ $wisata->foto }}" width="300">
@endif

<p>{{ $wisata->deskripsi }}</p>
<p>Harga Tiket: Rp {{ number_format($wisata->harga_tiket) }}</p>
<p>Status: {{ $wisata->status }}</p>

@if ($wisata->status == 'Pending')
    <a href="{{ route('wisata.verifikasi', $wisata->id) }}" class="btn btn-success">Verifikasi</a>
@endif

@endsection
