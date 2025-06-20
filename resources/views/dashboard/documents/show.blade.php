@extends('dashboard.layout.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Detail Dokumen</h5>
            </div>
            <div class="card-body">
                <h4>{{ $document->judul }}</h4>
                <p class="text-muted">Slug: {{ $document->slug }}</p>

                <div class="mb-3">
                    <label class="fw-bold">Deskripsi:</label>
                    <p>{!! nl2br(e($document->deskripsi)) !!}</p>
                </div>

                @if ($document->gambar)
                    <div class="mb-3">
                        <label class="fw-bold">Gambar:</label><br>
                        <img src="{{ asset('storage/' . $document->gambar) }}" class="img-fluid rounded shadow-sm"
                            width="300">
                    </div>
                @endif

                @if ($document->link)
                    <div class="mb-3">
                        <label class="fw-bold">Link Dokumen:</label><br>
                        <a href="{{ $document->link }}" target="_blank">{{ $document->link }}</a>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="fw-bold">Jenis Dokumen:</label><br>
                    <span class="badge bg-secondary">
                        @switch($document->jenis)
                            @case(1)
                                Pusat Audit Mutu
                            @break

                            @case(2)
                                Pusat Pengembangan
                                Standart Mutu Akademik
                            @break

                            @case(3)
                                Pusat Pengembangan
                                Standart Mutu Non Akademik
                            @break
                        @endswitch
                    </span>
                </div>

                <a href="{{ route('documents.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection
