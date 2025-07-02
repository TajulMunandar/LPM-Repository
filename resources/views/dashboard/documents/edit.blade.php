@extends('dashboard.layout.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">Edit Dokumen</h5>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $document->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" required>{{ old('deskripsi', $document->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link Dokumen (opsional)</label>
                        <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"
                            value="{{ old('link', $document->link) }}">
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($document->gambar)
                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini:</label><br>
                            <img src="{{ asset('storage/' . $document->gambar) }}" alt="Gambar" class="img-thumbnail mb-2"
                                width="200">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Ganti Gambar (opsional)</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Dokumen</label>
                        <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="1" {{ $document->jenis == 1 ? 'selected' : '' }}>Pusat Audit Mutu</option>
                            <option value="2" {{ $document->jenis == 2 ? 'selected' : '' }}>Pusat Pengembangan
                                Standart Mutu Akademik</option>
                            <option value="3" {{ $document->jenis == 3 ? 'selected' : '' }}>Pusat Pengembangan
                                Standart Mutu Non Akademik</option>
                            <option value="4" {{ $document->jenis == 4 ? 'selected' : '' }}>Sertifikat Akreditasik
                            </option>
                            <option value="5" {{ $document->jenis == 5 ? 'selected' : '' }}>Instrumen Akreditasi
                            </option>
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('documents.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-warning text-white">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
