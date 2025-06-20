@extends('dashboard.layout.main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">Edit Berita</h5>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Berita</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            id="judul" value="{{ old('judul', $berita->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Berita</label>
                        <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" id="isi" rows="5" required>{{ old('isi', $berita->isi) }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($berita->gambar)
                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini:</label><br>
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-thumbnail"
                                style="max-height: 150px;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Ganti Gambar (opsional)</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                            id="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning text-white">Perbarui</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
