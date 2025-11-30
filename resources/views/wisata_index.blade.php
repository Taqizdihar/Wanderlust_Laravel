@extends('layout')

@section('title', 'Kelola Destinasi Wisata')

@section('content')
    
    <h2>Daftar Destinasi Wisata</h2>

    <div class="search-container">
        <form action="{{ route('admin.wisata.index') }}" method="GET">
            <input type="text" name="keyword" class="search-input" placeholder="Cari Nama Wisata..." value="{{ request('keyword') }}">
            <button type="submit" class="btn-search"><i class="fas fa-search"></i> Cari</button>
        </form>
    </div>
    
    <div class="data-table-area">
        <p>Data tempat wisata (tabel) akan ditampilkan di sini.</p>
    </div>

@endsection