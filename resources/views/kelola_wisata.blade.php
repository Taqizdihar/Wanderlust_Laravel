@extends('layout')

@section('content')
<div class="card" style="padding: 20px; margin-top:20px;">
    <div class="d-flex justify-content-between">
        <h3>Kelola Destinasi Wisata</h3>
        <a href="{{ route('wisata.create') }}" class="btn btn-primary">+ Tambah Wisata</a>
    </div>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($wisatas as $w)
            <tr>
                <td>
                    @if($w->foto)
                    <img src="/uploads/wisata/{{ $w->foto }}" width="70">
                    @endif
                </td>

                <td>{{ $w->nama }}</td>
                <td>{{ Str::limit($w->deskripsi, 40) }}</td>

                <td>
                    <span class="badge 
                    @if($w->status=='Pending') bg-warning 
                    @else bg-success @endif">
                        {{ $w->status }}
                    </span>
                </td>

                <td>
                    <a href="{{ route('wisata.show', $w->id) }}" class="btn btn-info btn-sm">Detail</a>

                    @if($w->status == 'Pending')
                    <a href="{{ route('wisata.verifikasi', $w->id) }}" class="btn btn-success btn-sm">
                        Verifikasi
                    </a>
                    @endif

                    <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
