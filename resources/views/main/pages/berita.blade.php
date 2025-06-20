@extends('main.layout.main')

@section('content')
    <!-- Page Title -->


    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <section id="blog-posts" class="blog-posts section">
                    <div class="container">
                        <div class="row gy-4">
                            @forelse ($beritas as $berita)
                                <div class="col-lg-12">
                                    <article>
                                        <div class="post-img">
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                                class="img-fluid">
                                        </div>

                                        <h2 class="title">
                                            <a href="{{ route('news.show', $berita->id) }}">{{ $berita->judul }}</a>
                                        </h2>

                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center">
                                                    <i class="bi bi-clock"></i>
                                                    <a href="#"><time
                                                            datetime="{{ $berita->created_at }}">{{ $berita->created_at->format('M d, Y') }}</time></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="content">
                                            <p>{{ Str::limit(strip_tags($berita->isi), 200) }}</p>
                                            <div class="read-more">
                                                <a href="{{ route('news.show', $berita->id) }}">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @empty
                                <p class="text-center">Belum ada berita.</p>
                            @endforelse
                        </div>
                    </div>
                </section>


                @if ($beritas->hasPages())
                    <section id="blog-pagination" class="blog-pagination section">
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul class="pagination">
                                    {{-- Tombol Previous --}}
                                    <li class="{{ $beritas->onFirstPage() ? 'disabled' : '' }}">
                                        <a href="{{ $beritas->previousPageUrl() ?? '#' }}"><i
                                                class="bi bi-chevron-left"></i></a>
                                    </li>

                                    {{-- Nomor Halaman --}}
                                    @php
                                        $currentPage = $beritas->currentPage();
                                        $lastPage = $beritas->lastPage();
                                        $start = max(1, $currentPage - 2);
                                        $end = min($lastPage, $currentPage + 2);
                                    @endphp

                                    @if ($start > 1)
                                        <li><a href="{{ $beritas->url(1) }}">1</a></li>
                                        @if ($start > 2)
                                            <li><span>...</span></li>
                                        @endif
                                    @endif

                                    @for ($i = $start; $i <= $end; $i++)
                                        <li>
                                            <a href="{{ $beritas->url($i) }}"
                                                class="{{ $i == $currentPage ? 'active' : '' }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($end < $lastPage)
                                        @if ($end < $lastPage - 1)
                                            <li><span>...</span></li>
                                        @endif
                                        <li><a href="{{ $beritas->url($lastPage) }}">{{ $lastPage }}</a></li>
                                    @endif

                                    {{-- Tombol Next --}}
                                    <li class="{{ $beritas->hasMorePages() ? '' : 'disabled' }}">
                                        <a href="{{ $beritas->nextPageUrl() ?? '#' }}"><i
                                                class="bi bi-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                @endif

            </div>

        </div>
    </div>
@endsection
