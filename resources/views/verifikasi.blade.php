@extends('layout')

@section('title', 'Verifikasi Tempat Wisata')

@section('content')
  <h1>Halaman Verifikasi</h1>
  <p>Verifikasi data tempat wisata dengan ID: <strong>{{ $id }}</strong></p>

  <a href="{{ route('tempat-wisata') }}" class="btn">Kembali ke Daftar</a>
@endsection
