@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Penilaian Kamu</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">+ Buat Penilaian Baru</a>

    @if ($reviews->count() == 0)
        <p>Kamu belum membuat penilaian.</p>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->rating }} ⭐</td>
                <td>{{ $review->komentar }}</td>
                <td>{{ $review->created_at->format('d M Y') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
