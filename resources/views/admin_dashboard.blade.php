@extends('layout')

@section('title', 'Dashboard Utama')

@section('content')
    <h2>Selamat Datang, Admin</h2>

    <div class="card-container">
        <div class="info-card" style="border-bottom: 4px solid #3498db;">
            <div class="card-title">Total Destinasi</div>
            <div class="card-value">12</div>
        </div>
        <div class="info-card" style="border-bottom: 4px solid #2ecc71;">
            <div class="card-title">Pengguna Aktif</div>
            <div class="card-value">245</div>
        </div>
        <div class="info-card" style="border-bottom: 4px solid #f39c12;">
            <div class="card-title">Transaksi Bulan Ini</div>
            <div class="card-value">67</div>
        </div>
        <div class="info-card" style="border-bottom: 4px solid #e74c3c;">
            <div class="card-title">Estimasi Pendapatan</div>
            <div class="card-value">Rp 12.5M</div>
        </div>
    </div>
    
    <div class="card-container" style="margin-top: 0;">
        <div class="info-card" style="border-bottom: 4px solid #3498db; width: 220px; padding: 25px;">
            <a href="{{ route('admin.user.index') }}" style="text-decoration: none; color: inherit;">
                <div class="card-title">Total User</div>
                <div class="card-value">250</div>
            </a>
        </div>
        </div>

@endsection