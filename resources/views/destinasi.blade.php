<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanderlust - Destinasi Wisata</title>

    {{-- pakai CSS kelompokmu --}}
   <link rel="stylesheet" href="{{ asset('administrator/cssAdmin/accproperti.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>

    <header>
        <div class="navbar">
            <h1>🌍 Wanderlust</h1>
            <nav>
                <a href="/">Home</a>
                <a href="#">Profil</a>
                <a href="#">Favorit</a>
            </nav>
        </div>

        <div class="hero">
            <h2>Wanderings For Wonders</h2>
            <p>Temukan destinasi wisata terbaik untuk liburanmu!</p>
        </div>
    </header>

    <main>
        <h2 class="section-title">Destinasi Wisata Populer</h2>

        <div class="card-container">
            @foreach ($destinasi as $item)
                <div class="card">
                    <img src="{{ asset('pemilikWisata/foto/' . $item['foto']) }}" alt="{{ $item['nama'] }}">
                    <div class="card-content">
                        <h3>{{ $item['nama'] }}</h3>
                        <p>📍 {{ $item['lokasi'] }}</p>
                        <p>⭐ {{ $item['rating'] }}</p>
                        <a href="/lokasi/{{ $item['id'] }}" class="btn">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Wanderlust. All rights reserved.</p>
    </footer>

</body>
</html>
