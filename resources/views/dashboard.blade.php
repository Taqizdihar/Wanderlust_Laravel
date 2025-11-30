@extends('layout')

@section('title', 'Dashboard Utama')

@section('content')
    
    <h2>Selamat Datang, Admin</h2>

    <div class="metric-cards">
        <div class="metric-card" style="border-bottom: 4px solid #3498db;">
            <p class="title">Total Destinasi</p>
            <p class="value">12</p>
        </div>

        <div class="metric-card" style="border-bottom: 4px solid #2ecc71;">
            <p class="title">Pengguna Aktif</p>
            <p class="value">245</p>
        </div>

        <div class="metric-card" style="border-bottom: 4px solid #f39c12;">
            <p class="title">Transaksi Bulan Ini</p>
            <p class="value">67</p>
        </div>
        
        <div class="metric-card" style="border-bottom: 4px solid #e74c3c;">
            <p class="title">Estimasi Pendapatan</p>
            <p class="value">Rp 12.5M</p>
        </div>
    </div>
    
    @endsection