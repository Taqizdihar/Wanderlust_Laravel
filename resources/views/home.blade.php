<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    {{-- Font Awesome untuk ikon pencarian dan user --}}
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

        {{-- 🔍 Form pencarian yang terhubung ke halaman Pencarian --}}
        <form action="{{ route('pencarian') }}" method="GET" class="search-bar">
            <input 
                type="text" 
                name="kataKunci" 
                placeholder="Cari destinasi wisata..." 
                required
            >
            <button type="submit" class="search-button">
                <i class="search-icon fas fa-search"></i>
            </button>
        </form>

        <div class="nav-links">
            <a href="#">Beranda</a>
            <a href="#">Destinasi</a>
            <a href="#">Tentang</a>
            <a href="{{ route('editProfil') }}">
                <div class="profile-icon">
                    <i class="fas fa-user"></i>
                </div>
            </a>
        </div>
    </header>

    {{-- Konten utama --}}
    <h2 class="section-title">Destinasi Populer</h2>
    <div class="card-gallery">
        <div class="cards-destination">
            <div class="card-images" style="background-image: url('{{ asset('images/bali.jpg') }}');">
                <h4>Pantai Bali</h4>
            </div>
            <div class="destination-content">
                <p>Menikmati keindahan alam dan budaya Bali yang mempesona.</p>
                <div class="stars">★★★★★</div>
                <a href="#" class="card-button">Lihat Selengkapnya</a>
            </div>
        </div>
        {{-- Tambahkan card lainnya di sini --}}
    </div>
</body>

<footer class="footer">
    <div class="footer-top">
      <div class="footer-left">
        <div class="footer-logo">
          <img src="Umum/foto/Wanderlust Logo Plain.png" alt="Wanderlust Logo" class="logo-img">
          <span class="logo-text">Wanderlust</span>
        </div>
      </div>
      <div class="footer-links">
        <a href="#">Tentang Kami</a>
        <a href="#">Kontak Kami</a>
        <a href="#">FAQs</a>
        <a href="#">Komunitas</a>
        <a href="#">Tips & Tik</a>
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

</html>