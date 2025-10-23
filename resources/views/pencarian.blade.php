<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="{{ asset('css/Pencarian.css') }}">
</head>
<body>
    <main class="main-content">
        <div class="section-title">
            <h2>Result for {{ $kataKunci }}</h2>

            <div class="filter">
                <label>Category</label>
                <select>
                    <option selected>Most Relevant</option>
                </select>
            </div>
        </div>

        <div class="card-gallery">
            @forelse ($hasilPencarian as $hasil)
                <div class="cards-destination">
                    <div class="card-images" style="background-image: url('{{ asset('pemilikWisata/foto/' . $hasil['link_foto']) }}');">
                        <h4>{{ $hasil['nama_lokasi'] }}</h4>
                    </div>
                    <div class="destination-content">
                        <p>{{ $hasil['sumir'] }}</p>
                        <div class="stars"></div>
                        <a class="card-button" href="{{ url('detailDestinasiWisata?tempatwisata_id=' . $hasil['tempatwisata_id']) }}">Check</a>
                    </div>
                </div>
            @empty
                <p>Tidak ada hasil ditemukan untuk "{{ $kataKunci }}"</p>
            @endforelse
        </div>
    </main>
</body>
</html>