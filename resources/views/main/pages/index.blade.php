@extends('main.layout.main')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            @forelse ($beritas as $berita)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="d-block w-100"
                        style="height: 90vh; object-fit: cover;" alt="{{ $berita->judul }}">
                    <div class="carousel-container">
                        <h2>{{ $berita->judul }}</h2>
                        <p>{{ Str::limit(strip_tags($berita->isi), 150) }}</p>
                        <a href="{{ route('news.show', $berita->id) }}" class="btn-get-started">Selengkapnya</a>
                    </div>
                </div>
            @empty
                <div class="carousel-item active">
                    <img src="{{ asset('main/assets/img/hero-carousel/hero-carousel-1.jpg') }}" class="d-block w-100"
                        style="height: 90vh; object-fit: cover;" alt="Default Slide">
                    <div class="carousel-container">
                        <h2>Selamat Datang</h2>
                        <p>Tidak ada berita terbaru saat ini. Silakan kembali lagi nanti.</p>
                        <a href="#featured-services" class="btn-get-started">Mulai</a>
                    </div>
                </div>
            @endforelse
            @if ($beritas->count() > 1)
                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            @endif

        </div>

    </section>
    <!-- /Hero Section -->



    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container text-center mb-5" data-aos="fade-up">
            <h6 class="text-success fw-semibold">Total</h6>
            <h2 class="fw-bold">Dokumen Terpublish</h2>
        </div>

        <div class="container">
            <div class="row g-4 justify-content-center">

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 bg-white rounded shadow-sm h-100 text-center">
                        <div class="mb-3">
                            <i class="bi bi-briefcase fs-1 text-success"></i>
                        </div>
                        <h5 class="fw-bold">Pusat Audit Mutu</h5>
                        <p class="text-muted">Menjamin kualitas institusi melalui audit internal yang terstruktur dan
                            berkelanjutan. Dokumen pada kategori ini mencerminkan akuntabilitas dan peningkatan mutu yang
                            konsisten.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 bg-white rounded shadow-sm h-100 text-center">
                        <div class="mb-3">
                            <i class="bi bi-card-checklist fs-1 text-success"></i>
                        </div>
                        <h5 class="fw-bold">Pusat Pengembangan Standar Mutu Akademik</h5>
                        <p class="text-muted">Berisi dokumen pengembangan kurikulum, pembelajaran, dan evaluasi akademik
                            yang memastikan mutu pendidikan sesuai standar nasional dan kebutuhan zaman.</p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-4 bg-white rounded shadow-sm h-100 text-center">
                        <div class="mb-3">
                            <i class="bi bi-bar-chart fs-1 text-success"></i>
                        </div>
                        <h5 class="fw-bold">Pusat Pengembangan Standar Mutu Non Akademik</h5>
                        <p class="text-muted">Dokumen yang mengatur tata kelola layanan non-akademik seperti administrasi,
                            kepegawaian, dan kemahasiswaan guna mendukung terciptanya lingkungan kampus yang unggul dan
                            profesional.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
