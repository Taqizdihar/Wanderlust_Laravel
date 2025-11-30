@extends('layout')
@section('title', 'Data Penilaian')

@section('content')

<h1>Data Penilaian Wisata</h1>

<a href="{{ route('reviews.create') }}" class="btn btn-primary">+ Tambah Penilaian</a>

<table class="table">
    <thead>
        <tr>
            <th>User</th>
            <th>Destinasi</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($reviews as $r)
        <tr>
            <td>{{ $r->user->name }}</td>
            <td>{{ $r->destinasi->nama }}</td>
            <td>{{ $r->rating }}</td>
            <td>{{ $r->komentar }}</td>
            <td>
                <a href="{{ route('reviews.edit', $r->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('reviews.destroy', $r->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
