<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Wisata - {{ $destinasi->nama_tempat }}</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    
    {{-- CSS Dasar Header/Footer --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- CSS Khusus Halaman Detail Destinasi (Perbaikan Layout) --}}
    <link rel="stylesheet" href="{{ asset('css/detailDestinasiWisata.css') }}">
    
    {{-- Wajib: Tambahkan Bootstrap jika belum ada di home.css/layout --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
{{-- =============================================== --}}
{{-- START HEADER (DISALIN DARI home.blade.php) --}}
{{-- =============================================== --}}
<header class="main-header">
    <div class="logo-container">
        <img src="{{ asset('/images/Logos/Wanderlust Logo Circle.png') }}" alt="Logo" class="logo">
        <div class="logo-text">
            <span class="title">Wanderlust</span>
            <span class="subtitle">WANDERINGS FOR WONDERS</span> 
        </div>
    </div>

    <form action="{{ route('pencarian') }}" method="GET" class="search-bar">
        <input type="text" name="kataKunci" placeholder="Cari destinasi wisata..." required>
        <button type="submit" class="search-button">
            <i class="search-icon fas fa-search"></i>
        </button>
    </form>

    <div class="nav-links">
       <a href="{{ Auth::guard('wisatawan')->check() ? route('transaksi.riwayat') : route('login') }}">Pesan Tiket</a>
       <a href="{{ Auth::guard('wisatawan')->check() ? route('penilaian.index') : route('login') }}">Penilaian</a>
       <a href="{{ Auth::guard('wisatawan')->check() ? route('bookmark.index') : route('login') }}">Favorit</a>
       <a href="{{ Auth::guard('wisatawan')->check() ? route('profil') : route('login') }}">
            <div class="profile-icon">
                @if(Auth::guard('wisatawan')->check() && Auth::guard('wisatawan')->user()->foto_profil)
                    <img src="{{ asset('images/profiles/' . Auth::guard('wisatawan')->user()->foto_profil) }}" alt="Foto Profil">
                @else
                    <i class="fas fa-user"></i>
                @endif
            </div>
       </a>
    </div>
</header>
{{-- =============================================== --}}
{{-- END HEADER --}}
{{-- =============================================== --}}


{{-- =============================================== --}}
{{-- START KONTEN UTAMA (BODY DETAIL DESTINASI) --}}
{{-- =============================================== --}}

@php
    $header_foto = $destinasi->fotoTempatWisatas->sortBy('urutan')->first();
    $pemilik = $destinasi->pemilikTempatWisata;
@endphp

<div class="header-image" style="background-image: url('{{ asset('images/Images/' . ($header_foto->url_foto ?? 'placeholder.jpg')) }}');">
    <button onclick="history.back()" class="back-button">Go back</button>
</div>

<div class="container my-5">
    
    {{-- BARIS UTAMA (STRUKTUR LAYOUT 8/4) --}}
    <div class="row">
        
        {{-- KOLOM KIRI (8/12) - Informasi Utama, Deskripsi, Pemilik --}}
        <div class="col-lg-8">
            <h2 class="destination-title">{{ $destinasi->nama_tempat }}</h2>
            <p class="text-muted mb-3">{{ $destinasi->jenis_tempat }}</p>

            {{-- TOMBOL FAVORIT (Diabaikan untuk tampilan) --}}
            {{-- <button type="button" class="favorit-btn mb-3">🌟 Tambah ke Bookmark</button> --}}
            
            <div class="info-group">
                <p><strong><i class="fas fa-clock icon-green"></i> Operational Hours:</strong> {{ $destinasi->waktu_buka }} - {{ $destinasi->waktu_tutup }}</p>
                <p><strong><i class="fas fa-ticket-alt icon-green"></i> Harga Tiket Mulai Dari:</strong> <span class="price-text">Rp {{ number_format($destinasi->hargaTermurah ?? 0, 0, ',', '.') }}</span></p>
            </div>

            <hr class="my-4">
            <h3>Deskripsi</h3>
            <p class="description-text">{{ $destinasi->deskripsi }}</p>
            <hr class="my-4">
            <h3>Alamat</h3>
            <p>{{ $destinasi->alamat_tempat }}</p>
            <hr class="my-4">

            {{-- INFORMASI PEMILIK --}}
            @if($pemilik)
            <h3>Pemilik</h3>
            <div class="d-flex align-items-center owner-section p-3 mb-4">
                {{-- Perbaikan: Pastikan path gambar dan class image diterapkan --}}
                <img src="{{ asset('images/profiles/' . ($pemilik->foto_instansi ?? 'default.jpg')) }}" alt="Foto Instansi" class="owner-image">
                <div class="ms-3">
                    <h5 class="mb-1">{{ $pemilik->npwp ?? 'Tidak Diketahui' }}</h5>
                    <p class="mb-0 text-muted">Dikelola oleh {{ $pemilik->siu ?? 'Entitas Tidak Dikenal' }}</p>
                </div>
            </div>
            @endif
        </div>

        {{-- KOLOM KANAN (4/12) - Rating & Galeri Foto --}}
        <div class="col-lg-4">
            {{-- RATING OVERVIEW --}}
            <div class="rating-overview text-center mb-4 p-4">
                <h4>Ikhtisar Peringkat</h4>
                <span class="display-4 fw-bold rating-score">{{ $avg_rating }}</span>
                <i class="fas fa-star text-warning"></i>
                <p class="text-muted review-count">({{ $total_reviews }} ulasan)</p>
            </div>
            
            {{-- GALERI FOTO (Grid) --}}
            <h4 class="mb-3">Foto</h4>
            <div class="row">
                @foreach ($destinasi->fotoTempatWisatas->sortBy('urutan')->skip(1) as $foto)
                <div class="col-6 mb-3">
                    <img src="{{ asset('images/Images/' . $foto->url_foto) }}" class="grid-image" alt="Gallery Photo">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- END BARIS UTAMA --}}

    <hr class="my-5">

    {{-- BAGIAN PAKET --}}
    <h2 class="mb-4">Paket</h2>
    <div class="row">
        @forelse ($destinasi->paketWisatas as $paket)
        <div class="col-md-6 col-lg-4">
            <div class="card card-package">
                {{-- Perbaikan: Pastikan path gambar paket diterapkan --}}
                <img src="{{ asset('images/Images/paketWisata/' . ($paket->foto_paket ?? 'default_paket.jpg')) }}" class="card-img-top" alt="Foto Paket"> 
                <div class="card-body">
                    <h5 class="card-title">{{ $paket->nama_paket }}</h5>
                    <p class="card-text">{{ $paket->deskripsi }}</p>
                    <h4 class="package-price">Rp. {{ number_format($paket->harga, 0, ',', '.') }}</h4>
                    <a href="{{ route('pesan.tiket.form', ['idPaket' => $paket->id_paket]) }}" class="btn btn-success w-100">Pilih</a>
                    <small class="d-block mt-2 text-center text-danger">{{ $paket->jumlah }} tiket tersisa</small>
                </div>
            </div>
        </div>
        @empty
            <p class="col-12 text-center text-muted">Saat ini belum tersedia paket.</p>
        @endforelse
    </div>

    <hr class="my-5">

    {{-- BAGIAN ULASAN / PENILAIAN --}}
    <h2 class="mb-4">Ulasan</h2>
    
    <div class="row">
        @forelse ($penilaians as $penilaian)
        <div class="col-md-6 col-lg-4">
            <div class="card card-review mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>{{ $penilaian->nama_pengulas }}</h5>
                        <span class="badge bg-warning text-dark rating-badge">{{ $penilaian->penilaian }} <i class="fas fa-star"></i></span>
                    </div>
                    <p class="mt-2 review-comment">"{{ $penilaian->ulasan }}"</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center text-muted">Belum ada ulasan yang disetujui untuk destinasi ini.</p>
        </div>
        @endforelse
    </div>
</div>
{{-- =============================================== --}}
{{-- END KONTEN UTAMA --}}
{{-- =============================================== --}}


{{-- =============================================== --}}
{{-- START FOOTER (DISALIN DARI home.blade.php) --}}
{{-- =============================================== --}}
<footer class="footer">
    <div class="footer-top">
        <div class="footer-left">
            <div class="logo-text footer-logo">
                <img src="{{ asset('/images/Logos/Wanderlust Logo Circle.png') }}" alt="Logo" class="logo-img">
                <span class="title">Wanderlust</span>
            </div>
        </div>

        <div class="footer-links-container">
            <div class="footer-column">
                <a href="#">Tentang Kami</a>
                <a href="#">Kontak Kami</a>
                <a href="#">FAQs</a>
            </div>

            <div class="footer-column">
                <a href="#">Komunitas</a>
                <a href="#">Tips & Trick</a>
                <a href="#">Promo</a>
            </div>

            <div class="footer-column">
                <a href="{{ route('profil') }}">Profil</a>
                <a href="#">Agenda</a>
                <a href="{{ route('home') }}">Home</a>
            </div>
        </div>
    </div>
    
    <div class="footer-center">
        Copyright © 2025 Wanderlust. All rights reserved
    </div>
</footer>
{{-- =============================================== --}}
{{-- END FOOTER --}}
{{-- =============================================== --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>