@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Penilaian Saya</h2>

    <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">Buat Penilaian</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($reviews->isEmpty())
        <p>Belum ada penilaian.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->komentar }}</td>
                    <td>{{ $review->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
