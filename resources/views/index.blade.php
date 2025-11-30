@extends('layout')

@section('title', 'Daftar Penilaian')

@section('content')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<h1 class="page-title">Daftar Penilaian Pengguna</h1>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="review-container">
    <table class="review-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Destinasi</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->user->name ?? '-' }}</td>
                <td>{{ $review->destinasi->nama ?? '-' }}</td>
                <td class="rating">⭐ {{ $review->rating }}</td>
                <td>{{ $review->komentar }}</td>
                <td>{{ $review->created_at->format('d M Y') }}</td>
                <td>
                    <a class="btn-edit" href="{{ route('reviews.edit', $review->id) }}">Edit</a>

                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
