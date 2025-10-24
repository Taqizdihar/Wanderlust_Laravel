@extends('layout')

@section('title', 'Verifikasi Detail ' . $data_wisata['nama'])

@section('content')
  <h1>Verifikasi Detail Tempat Wisata: {{ $data_wisata['nama'] }}</h1>
  
  <div class="card-container" style="flex-direction: column; gap: 15px; margin-bottom: 20px;">
    
    <div class="card">
        <h3>Informasi Dasar</h3>
        <p><strong>Lokasi:</strong> {{ $data_wisata['lokasi'] }}</p>
        <p><strong>Harga Tiket:</strong> Rp{{ number_format($data_wisata['harga'], 0, ',', '.') }}</p>
        <p><strong>Pemilik:</strong> {{ $data_wisata['pemilik'] }}</p>
        <p><strong>Dokumen Izin:</strong> {{ $data_wisata['dokumen_izin'] }}</p>
        <p><strong>Tanggal Input:</strong> {{ $data_wisata['tanggal_input'] }}</p>
    </div>

    <div class="card">
        <h3>Deskripsi Tempat</h3>
        <p>{{ $data_wisata['deskripsi'] }}</p>
    </div>
  </div>

  <div class="card" style="max-width: 600px;">
    <h2>Update Status Verifikasi</h2>
    <h3 style="margin-bottom: 15px;">Status Saat Ini: 
        <span class="badge {{ $data_wisata['status'] == 'Selesai' ? 'success' : 'info' }}">
          {{ $data_wisata['status'] }}
        </span>
    </h3>

    <form action="{{ route('verifikasi.update', ['id' => $data_wisata['id']]) }}" method="POST" style="margin-top: 15px;">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label for="status_select" style="display: block; margin-bottom: 5px;">Pilih Status Baru:</label>
            <select name="status" id="status_select" class="form-control" style="width: 100%;">
                <option value="Pending" {{ $data_wisata['status'] == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Selesai" {{ $data_wisata['status'] == 'Selesai' ? 'selected' : '' }}>Selesai (Terverifikasi)</option>
            </select>
        </div>
        
        <button type="submit" class="btn" style="background: #007BFF; width: 100%;">Update Status</button>
    </form>
  </div>

  <div style="margin-top: 30px;">
    <a href="{{ route('tempat-wisata') }}" class="btn" style="background: #6c757d;">Kembali ke Daftar</a>
  </div>
@endsection