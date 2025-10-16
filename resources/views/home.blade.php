<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Wisata</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <header class="main-header">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <div class="logo-text">
                <div class="title">WANDERLUST</div>
                <div class="subtitle">WANDERS FOR WONDERS</div>
            </div>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Cari destinasi...">
            <span class="search-icon">🔍</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('profil.edit') }}">Profil</a>
        </div>
    </header>

    <section class="section-title">Destinasi Populer</section>

    <div class="card-gallery">
        @foreach ($destinasi as $d)
        <div class="cards-destination">
            <div class="card-images" style="background-image: url('{{ asset('images/' . $d['gambar']) }}')">
                <h4>{{ $d['nama'] }}</h4>
            </div>
            <div class="destination-content">
                <p>{{ $d['deskripsi'] }}</p>
                <div class="stars">⭐ {{ $d['rating'] }}</div>
                <a href="#" class="card-button">Lihat Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>