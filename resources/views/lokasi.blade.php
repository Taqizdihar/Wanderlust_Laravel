<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dataLokasi['nama_lokasi'] }} - Property Verification</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert+One">
    <style>
        body {
            font-family: 'MuseoModerno', sans-serif;
            background-color: #fdfdfd;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .back-button {
            background: #eee;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            color: black;
        }
        .main-image { width: 100%; border-radius: 12px; margin-top: 20px; }
        .image-grid { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px; }
        .image-grid img { width: 30%; border-radius: 8px; }
        .actions { margin-top: 20px; display: flex; gap: 10px; }
        .edit-btn {
            background: #ff4081;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
        }
        .edit-btn#rejected { background: #e74c3c; }
    </style>
</head>
<body>
    <div class="container">
        <a href="#" onclick="history.back()" class="back-button">← Kembali</a>

        @if(count($fotos) > 0)
            <img src="{{ asset('pemilikWisata/foto/' . $fotos[0]) }}" alt="Foto Utama" class="main-image">
            <div class="image-grid">
                @foreach(array_slice($fotos, 1) as $foto)
                    <img src="{{ asset('pemilikWisata/foto/' . $foto) }}" alt="Foto Lain">
                @endforeach
            </div>
        @endif

        <h1>{{ $dataLokasi['nama_lokasi'] }}</h1>
        <p><strong>Jenis Wisata:</strong> {{ $dataLokasi['jenis_wisata'] }}</p>
        <p><strong>Jam Operasional:</strong> {{ $dataLokasi['waktu_buka'] }} - {{ $dataLokasi['waktu_tutup'] }}</p>

        <h3>Deskripsi:</h3>
        <p>{{ $dataLokasi['deskripsi'] }}</p>

        <p><strong>Nomor PIC:</strong> {{ $dataLokasi['nomor_pic'] }}</p>
        <a href="{{ asset('pengelolaWisata/photos/' . $dataLokasi['surat_izin']) }}" target="_blank">
            Lihat Surat Izin
        </a>

        @if($dataLokasi['status'] != 'active')
            <div class="actions">
                <a href="#" id="active" class="edit-btn" onclick="alert('Disetujui!')">Approve</a>
                <a href="#" id="rejected" class="edit-btn" onclick="alert('Ditolak!')">Reject</a>
            </div>
        @endif
    </div>
</body>
</html>
