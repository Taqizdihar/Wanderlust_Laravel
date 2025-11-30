<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorit - Saved Destination | Wanderlust</title>
    
    {{-- Diperlukan untuk AJAX/Fetch di halaman ini jika ada fitur search/toggle --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    
    {{-- Tautkan CSS utama dan CSS khusus bookmark --}}
    {{-- Jika kamu memiliki CSS global seperti home.css yang mengatur header/footer, tautkan di sini --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/bookmark.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
<header class="main-header">
    {{-- HEADER DISALIN DARI home.blade.php --}}
    <div class="logo-container">
        <img src="{{ asset('/images/Logos/Wanderlust Logo Circle.png') }}" alt="Logo" class="logo">
        <div class="logo-text">
            <span class="title">Wanderlust</span>
            <span class="subtitle">WANDERINGS FOR WONDERS</span> 
        </div>
    </div>

    {{-- Search bar di halaman Favorit ini berbeda/lebih sederhana dari Home --}}
    <form action="{{ route('pencarian') }}" method="GET" class="search-bar">
        <input type="text" name="kataKunci" placeholder="Cari destinasi wisata..." required>
        <button type="submit" class="search-button">
            <i class="search-icon fas fa-search"></i>
        </button>
    </form>

    <div class="nav-links">
        <a href="{{ Auth::check() ? route('transaksi.riwayat') : route('login') }}">Pesan Tiket</a>
        <a href="{{ Auth::check() ? route('penilaian.index') : route('login') }}">Penilaian</a>
        <a href="{{ Auth::check() ? route('bookmark.index') : route('login') }}">Favorit</a>
        
        <a href="{{ Auth::check() ? route('profil') : route('login') }}">
            <div class="profile-icon">
                @if(Auth::check() && Auth::user()->foto_profil)
                    <img src="{{ asset('images/profiles/' . Auth::user()->foto_profil) }}" alt="Foto Profil">
                @else
                    <i class="fas fa-user"></i>
                @endif
            </div>
        </a>
    </div>
</header>
{{-- AKHIR HEADER --}}

<div class="container my-5">
    <h1 class="text-center my-4">Saved Destination</h1>
    
    {{-- Search Bar dan Kategori (Sesuai Desain Figma) --}}
    <div class="d-flex justify-content-end mb-4 filter-bar">
        <div class="input-group me-2" style="width: 250px;">
            <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <button class="btn btn-info">Kategori</button>
    </div>

    {{-- LOOP DESTINASI FAVORIT --}}
    @forelse ($bookmarks as $bookmark)
        @php
            // Pastikan relasi Wisatawan dan Bookmark sudah diperbaiki di Controller
            if (!isset($bookmark->tempatWisata)) {
                continue; // Skip jika data tempat wisata tidak ditemukan
            }
            $tempat = $bookmark->tempatWisata;
            // Accessor untuk harga, kuota, dan rating
            $hargaTermurah = $tempat->harga_termurah; 
            $kuotaTiket = $tempat->kuota_tiket;
            $averageRating = $tempat->average_rating;

            // Logika untuk tombol Pesan
            $paketTermurah = $tempat->paketWisatas()->orderBy('harga')->first(); 
            
            // Logika Foto
            $foto = $tempat->fotoTempatWisatas->first();
        @endphp

        {{-- Struktur Card Sesuai Wireframe --}}
        <div class="card card-saved-destination mb-4 p-3 border-0">
            <div class="row align-items-center">
                
                {{-- 1. Bagian Gambar --}}
                <div class="col-md-2 col-3 d-flex justify-content-center">
                    <div class="image-placeholder-saved">
                        @if($foto)
                            <img src="{{ asset('images/Images/' . $foto->file_path) }}" 
                                 alt="{{ $tempat->nama_tempat }}" class="img-fluid">
                        @else
                            <i class="fas fa-image fa-3x text-muted"></i>
                        @endif
                    </div>
                </div>

                {{-- 2. Detail Destinasi --}}
                <div class="col-md-6 col-9">
                    <h3 class="destination-name">{{ $tempat->nama_tempat ?? 'Destinasi Tidak Ditemukan' }}</h3>
                    
                    {{-- Accessor Harga Termurah --}}
                    <p class="ticket-info mb-1"><i class="fas fa-ticket-alt me-2"></i> Ticket Price: **Rp {{ number_format($hargaTermurah ?? 0, 0, ',', '.') }}**</p>
                    
                    {{-- Accessor Kuota Tiket --}}
                    <p class="ticket-info mb-0"><i class="fas fa-box me-2"></i> Ticket Quota: **{{ $kuotaTiket ?? 'N/A' }}**</p>
                </div>
                
                {{-- 3. Rating (0,0 di Wireframe) --}}
                <div class="col-md-2 col-4 text-center mt-3 mt-md-0">
                    <div class="rating-box-lg">
                        <span class="h1 mb-0 fw-bold">{{ number_format($averageRating ?? 0, 1) }}</span>
                    </div>
                </div>

                {{-- 4. Tombol Aksi (Hapus & Pesan) --}}
                <div class="col-md-2 col-8 d-flex flex-column align-items-center">
                    
                    {{-- Tombol Hapus (Menggunakan Toggle POST Route) --}}
                    <form action="{{ route('bookmark.toggle', $tempat->id_tempat) }}" method="POST" class="w-100 mb-2">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Hapus</button>
                    </form>
                    
                    {{-- Tombol Pesan --}}
                    <a href="{{ route('pesan.tiket.form', $paketTermurah->id_paket ?? '0') }}" class="btn btn-info w-100">Pesan</a>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center">
            Kamu belum memiliki destinasi favorit yang tersimpan.
        </div>
    @endforelse
</div>
{{-- AKHIR LOOP DESTINASI FAVORIT --}}

<footer class="footer">
    {{-- FOOTER DISALIN DARI home.blade.php --}}
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
    {{-- AKHIR FOOTER --}}
</footer>
</body>
</html>