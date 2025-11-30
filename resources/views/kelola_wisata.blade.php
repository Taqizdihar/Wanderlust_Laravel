@extends('admin_layout')

@section('content')
    <h2>Kelola Wisata</h2>

    <div class="search-container">
        <form action="/kelola-wisata/search" method="GET">
            <input type="text" name="keyword" class="search-input" placeholder="Cari Nama Wisata...">
            <button type="submit" class="btn-search"><i class="fas fa-search"></i> Cari</button>
        </form>
    </div>
    
    <div class="data-table-area">
        <p>Data tempat wisata akan ditampilkan di sini (Tabel/List).</p>
        </div>
    
@endsection