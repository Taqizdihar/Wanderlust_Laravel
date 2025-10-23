<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanderlust - Destinasi Wisata</title>

    {{-- 👉 ini nyambung ke file CSS kamu di folder public/css --}}
    <link rel="stylesheet" href="{{ asset('css/accproperti.css') }}">
    
    {{-- Font dan Icon --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert+One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" crossorigin="anonymous" />
</head>

<body>
    <header>
        <h1>Wanderlust</h1>
        <p>Wanderings For Wonders</p>
        <nav>
            <a href="#">Home</a>
            <a href="#">Profil</a>
            <a href="#">Favorit</a>
        </nav>
    </header>

    <main>
        <h2>Destinasi Wisata Populer</h2>
        <div class="grid-container">
            @foreach ($destinasi as $item)
                <div class="card">
                    <img src="{{ asset('images/' . $item['foto']) }}" alt="{{ $item['nama'] }}">
                    <h3>{{ $item['nama'] }}</h3>
                    <p>📍 {{ $item['lokasi'] }}</p>
                    <p>⭐ {{ $item['rating'] }}</p>
                    <a href="{{ route('detail', $item['id']) }}" class="btn-detail">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
