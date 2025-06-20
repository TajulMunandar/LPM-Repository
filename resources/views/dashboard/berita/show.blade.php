@extends('dashboard.layout.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Detail Berita</h5>
            </div>
            <div class="card-body">
                <h4>{{ $berita->judul }}</h4>
                <p class="text-muted">Slug: {{ $berita->slug }}</p>

                @if ($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar" class="img-fluid rounded mb-3"
                        style="max-height: 300px;">
                @endif

                <p>{!! nl2br(e($berita->isi)) !!}</p>

                <a href="{{ route('berita.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
