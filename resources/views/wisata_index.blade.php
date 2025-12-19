@extends('layout')

@section('title', 'Kelola Destinasi Wisata')

@section('content')

<h2>Daftar Destinasi Wisata</h2>

<a href="{{ route('wisata.create') }}" class="btn btn-primary">+ Tambah Wisata</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga Tiket</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($wisatas as $w)
        <tr>
            <td>{{ $w->nama }}</td>
            <td>Rp {{ number_format($w->harga_tiket) }}</td>
            <td>{{ $w->status }}</td>
            <td>
                <a href="{{ route('wisata.show', $w->id) }}" class="btn btn-info">Detail</a>

                @if ($w->status == 'Pending')
                <a href="{{ route('wisata.verifikasi', $w->id) }}" class="btn btn-success">Verifikasi</a>
                @endif

                <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
