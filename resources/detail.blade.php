<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dataLokasi['nama_lokasi'] }}</title>
    <link rel="stylesheet" href="{{ asset('administrator/cssAdmin/accproperti.css') }}">
</head>
<body>

<div class="main">
    <div class="container">
        <button class="back-button" onclick="history.back()">← Kembali</button>

        @if(count($fotos) > 0)
            <img src="{{ asset('pemilikWisata/foto/' . $fotos[0]) }}" alt="Foto Utama" class="main-image">
        @endif

        <div class="image-grid">
            @foreach(array_slice($fotos, 1) as $foto)
                <img src="{{ asset('pemilikWisata/foto/' . $foto) }}" alt="Foto {{ $loop->index + 1 }}" class="grid-image">
            @endforeach
        </div>

        <div class="location-info">
            <h1 class="location-name">{{ $dataLokasi['nama_lokasi'] }}</h1>
            <p class="location-type">{{ $dataLokasi['jenis_wisata'] }}</p>
            <p class="location-hours">{{ $dataLokasi['waktu_buka'] }} - {{ $dataLokasi['waktu_tutup'] }}</p>
        </div>

        <div class="description">
            <h2>Deskripsi:</h2>
            <p>{{ $dataLokasi['deskripsi'] }}</p>
        </div>

        <div class="divider"></div>

        <div class="legal-document">
            <p><strong>Nomor PIC:</strong> {{ $dataLokasi['nomor_pic'] }}</p>
            <a href="{{ asset('pengelolaWisata/photos/' . $dataLokasi['surat_izin']) }}" target="_blank">View Legal Document</a>
        </div>

        @if ($dataLokasi['status'] != 'active')
        <div class="actions">
            <a href="#" class="edit-btn" id="active" onclick="alert('Property Approved!')">Approve</a>
            <a href="#" class="edit-btn" id="rejected" onclick="alert('Property Rejected!')">Reject</a>
        </div>
        @endif
    </div>
</div>

</body>
</html>
