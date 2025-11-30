@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Data Penilaian Wisatawan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->komentar }}</td>
                <td>{{ $review->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
