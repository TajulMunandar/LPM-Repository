@extends('main.layout.main')

@section('content')
    <!-- Page Title -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section id="blog-posts" class="blog-posts section">
                    <div class="container">
                        <div class="row gy-4">
                            @forelse ($documents as $document)
                                <div class="col-lg-12">
                                    <article>
                                        <div class="post-img">
                                            <img src="{{ asset('storage/' . $document->gambar) }}"
                                                alt="{{ $document->judul }}" class="img-fluid">
                                        </div>
                                        <h2 class="title">
                                            <a
                                                href="{{ route('documents.show', $document->id) }}">{{ $document->judul }}</a>
                                        </h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center">
                                                    <i class="bi bi-clock"></i>
                                                    <a href="#">
                                                        <time datetime="{{ $document->created_at }}">
                                                            {{ $document->created_at->format('M d, Y') }}
                                                        </time>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="content">
                                            <p>{{ Str::limit(strip_tags($document->deskripsi), 200) }}</p>
                                            <div class="read-more">
                                                <a href="{{ route('documents.show', $document->id) }}">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @empty
                                <p class="text-center">Belum ada dokumen.</p>
                            @endforelse
                        </div>
                    </div>
                </section>

                @if ($documents->hasPages())
                    <section id="document-pagination" class="document-pagination section">
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul class="pagination">
                                    <li class="{{ $documents->onFirstPage() ? 'disabled' : '' }}">
                                        <a href="{{ $documents->previousPageUrl() ?? '#' }}"><i
                                                class="bi bi-chevron-left"></i></a>
                                    </li>

                                    @php
                                        $currentPage = $documents->currentPage();
                                        $lastPage = $documents->lastPage();
                                        $start = max(1, $currentPage - 2);
                                        $end = min($lastPage, $currentPage + 2);
                                    @endphp

                                    @if ($start > 1)
                                        <li><a href="{{ $documents->url(1) }}">1</a></li>
                                        @if ($start > 2)
                                            <li><span>...</span></li>
                                        @endif
                                    @endif

                                    @for ($i = $start; $i <= $end; $i++)
                                        <li>
                                            <a href="{{ $documents->url($i) }}"
                                                class="{{ $i == $currentPage ? 'active' : '' }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    @if ($end < $lastPage)
                                        @if ($end < $lastPage - 1)
                                            <li><span>...</span></li>
                                        @endif
                                        <li><a href="{{ $documents->url($lastPage) }}">{{ $lastPage }}</a></li>
                                    @endif

                                    <li class="{{ $documents->hasMorePages() ? '' : 'disabled' }}">
                                        <a href="{{ $documents->nextPageUrl() ?? '#' }}"><i
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
