<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Verification</title>
    <link rel="stylesheet" href="{{ asset('administrator/cssAdmin/accproperti.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert+One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

@include('layouts.viewsAdmin')

<div class="main">
    <div class="container">
        <button class="back-button" onclick="history.back()">← Kembali</button>

        <img src="{{ asset('pemilikWisata/foto/' . $fotos[0]) }}" alt="Foto Utama Lokasi" class="main-image">

        <div class="image-grid">
            @for ($i = 1; $i < count($fotos); $i++)
                <img src="{{ asset('pemilikWisata/foto/' . $fotos[$i]) }}" alt="Foto {{ $i }}" class="grid-image">
            @endfor
        </div>

        <div class="location-info">
            <h1 class="location-name">{{ $dataLokasi->nama_lokasi }}</h1>
            <p class="location-type">{{ $dataLokasi->jenis_wisata }}</p>
            <p class="location-hours">{{ $dataLokasi->waktu_buka }} - {{ $dataLokasi->waktu_tutup }}</p>
        </div>

        <div class="description">
            <h2>Deskripsi:</h2>
            <p>{{ $dataLokasi->deskripsi }}</p>
        </div>

        <div class="divider"></div>

        <div class="legal-document">
            <p><strong>Nomor PIC:</strong> {{ $dataLokasi->nomor_pic }}</p>
            <a href="{{ asset('pengelolaWisata/photos/' . $dataLokasi->surat_izin) }}" target="_blank">View Legal Document</a>
        </div>

        @if ($dataLokasi->status != 'active')
        <div class="actions">
            <a href="{{ url('indeks?page=propertiStatus&id=' . $dataLokasi->tempatwisata_id . '&status=active') }}" 
               class="edit-btn" id="active" 
               onclick="return confirm('Are you sure you want to approve this property?')">Approve</a>

            <a href="{{ url('indeks?page=propertiStatus&id=' . $dataLokasi->tempatwisata_id . '&status=rejected') }}" 
               class="edit-btn" id="rejected" 
               onclick="return confirm('Are you sure you want to reject this property?')">Reject</a>
        </div>
        @endif
    </div>
</div>

</body>
</html>
