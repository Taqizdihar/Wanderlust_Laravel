<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Wanderlust</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
<header class="main-header">
    <div class="logo-container">
        <img src="{{ asset('/images/Logos/Wanderlust Logo Circle.png') }}" alt="Logo" class="logo">
        <div class="logo-text">
            <span class="title">Wanderlust</span>
            </div>
    </div>

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
        
        <a href="{{ Auth::check() ? route('edit-profil') : route('login') }}">
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
        <div class="card-images" style="{{ 'background-image: url(\'' . asset('images/Images') . '/' . $item['foto'] . '\')' }}">
            @if(Auth::check())
                <a href="#" class="bookmark-icon bookmark-toggle" data-id-tempat="{{ $item['id_tempat'] }}">
                    <i class="fas fa-bookmark {{ $item['is_bookmarked'] ? 'active' : '' }}"></i>
                </a>
            @endif
        </div>
        
        <div class="destination-content">
            <div class="rating-box">
                <span class="stars-static">
                    @php
                        $fullStars = floor($item['rating']);
                        $hasHalf = ($item['rating'] - $fullStars) >= 0.5;
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $fullStars)
                            <i class="fas fa-star"></i>
                        @elseif ($hasHalf && $i == $fullStars + 1)
                            <i class="fas fa-star-half-alt"></i>
                        @else
                            <i class="far fa-star"></i>
                        </i class="far fa-star"></i>
                        @endif
                    @endfor
                </span>
                <span class="rating-text">{{ $item['rating'] }} ({{ $item['reviews'] }} reviews)</span>
            </div>
            
            <p class="location-text">{{ $item['lokasi'] }}</p>
            
            <p class="price-info">
                Rp {{ $item['harga'] }}
            </p>
            
            <p class="description-text">{{ $item['deskripsi'] }}</p>

            <a href="{{ route('pencarian', ['kataKunci' => $item['nama']]) }}" class="card-button">Lihat Selengkapnya</a>
        </div>
    </div> 
    @endforeach
</div>

<h2 class="section-title">Rekomendasi Destinasi</h2>
<div class="card-gallery">
    @foreach ($rekomendasi as $item)
    <div class="cards-destination">
        <div class="card-images" style="{{ 'background-image: url(\'' . asset('images/Images') . '/' . $item['foto'] . '\')' }}">
            @if(Auth::check())
                <a href="#" class="bookmark-icon bookmark-toggle" data-id-tempat="{{ $item['id_tempat'] }}">
                    <i class="fas fa-bookmark {{ $item['is_bookmarked'] ? 'active' : '' }}"></i>
                </a>
            @endif
        </div>
        
        <div class="destination-content">
             <div class="rating-box">
                <span class="stars-static">
                    @php
                        $fullStars = floor($item['rating']);
                        $hasHalf = ($item['rating'] - $fullStars) >= 0.5;
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $fullStars)
                            <i class="fas fa-star"></i>
                        @elseif ($hasHalf && $i == $fullStars + 1)
                            <i class="fas fa-star-half-alt"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </span>
                <span class="rating-text">{{ $item['rating'] }} ({{ $item['reviews'] }} reviews)</span>
            </div>
            
            <p class="location-text">{{ $item['lokasi'] }}</p>
            <p class="price-info">
                Rp {{ $item['harga'] }}
            </p>
            <p class="description-text">{{ $item['deskripsi'] }}</p>
            
            <a href="{{ route('pencarian', ['kataKunci' => $item['nama']]) }}" class="card-button">Lihat Selengkapnya</a>
        </div>
    </div>
    @endforeach
</div>

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
                <a href="#">Profil</a>
                <a href="#">Agenda</a>
                <a href="{{ route('home') }}">Home</a>
            </div>
        </div>
    </div>
    
    <div class="footer-center">
        Copyright © 2025 Wanderlust. All rights reserved
    </div>
</footer>

@if(Auth::check())
<script>
    document.querySelectorAll('.bookmark-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const idTempat = this.getAttribute('data-id-tempat');
            const icon = this.querySelector('i');
            
            const endpoint = `/bookmark/toggle/${idTempat}`; 

            fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
                },
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    if (data.action === 'removed') {
                        icon.classList.remove('active');
                    } else {
                        icon.classList.add('active');
                    }
                } else {
                    alert('Gagal memproses bookmark. Coba cek koneksi atau status login.');
                }
            })
            .catch(error => {
                console.error('Error toggling bookmark:', error);
                alert('Gagal memproses bookmark. Silakan coba lagi.');
            });
        });
    });
</script>
@endif

</body>
</html>