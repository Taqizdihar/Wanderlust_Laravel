<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Wanderlust</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
<header class="main-header">
    <div class="logo-container">
        <img src="{{ asset('/images/Logos/Wanderlust Logo Circle.png') }}" alt="Logo" class="logo">
        <div class="logo-text">
            <span class="title">Wanderlust</span>
            <span class="subtitle">Wanderings For Wonders</span>
        </div>
    </div>

    <form action="{{ route('pencarian') }}" method="GET" class="search-bar">
        <input type="text" name="kataKunci" placeholder="Cari destinasi wisata..." required>
        <button type="submit" class="search-button">
            <i class="search-icon fas fa-search"></i>
        </button>
    </form>

    <div class="nav-links">
        <a href="#">Beranda</a>
        <a href="#">Destinasi</a>
        <a href="#">Tentang</a>
        <a href="{{ route('edit-profil') }}">
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

<h2 class="section-title">Destinasi Populer</h2>
<div class="card-gallery">
    @foreach ($populer as $item)
    <div class="cards-destination">
        <div class="card-images" style="background-image: url('{{ asset('images/Images/' . $item['foto']) }}');">
            <h4>{{ $item['nama'] }}</h4>
        </div>
        <div class="destination-content">
            <p>{{ $item['deskripsi'] }}</p>
            <div class="stars">★★★★★</div>
            <a href="{{ route('pencarian', ['kataKunci' => $item['nama']]) }}" class="card-button">Lihat Selengkapnya</a>
        </div>
    </div>
    @endforeach
</div>

<h2 class="section-title">Rekomendasi Destinasi</h2>
<div class="card-gallery">
    @foreach ($rekomendasi as $item)
    <div class="cards-destination">
        <div class="card-images" style="background-image: url('{{ asset('images/Images/'  . $item['foto']) }}');">
            <h4>{{ $item['nama'] }}</h4>
        </div>
        <div class="destination-content">
            <p>{{ $item['deskripsi'] }}</p>
            <div class="stars">★★★★★</div>
            <a href="{{ route('pencarian', ['kataKunci' => $item['nama']]) }}" class="card-button">Lihat Selengkapnya</a>
        </div>
    </div>
    @endforeach
</div>

<footer class="footer">
    <div class="footer-top">
        <div class="footer-left">
            <div class="footer-logo">
                <img src="{{ asset('/images/Logos/Wanderlust Logo Circle.png') }}" class="logo-img">
                <span class="logo-text">Wanderlust</span>
            </div>
        </div>
        <div class="footer-links">
            <a href="#">Tentang Kami</a>
            <a href="#">Kontak Kami</a>
            <a href="#">FAQs</a>
            <a href="#">Komunitas</a>
            <a href="#">Tips & Trik</a>
            <a href="#">Promo</a>
            <a href="#">Profil</a>
            <a href="#">Agenda</a>
            <a href="#">Home</a>
        </div>
    </div>
    <div class="footer-center">
        Copyright © 2025 Wanderlust. All rights reserved
    </div>
</footer>

</body>
</html>