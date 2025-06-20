@extends('main.layout.main')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <!-- Document Details Section -->
                <section id="document-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            @if ($document->gambar)
                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $document->gambar) }}" alt="{{ $document->judul }}"
                                        class="img-fluid">
                                </div>
                            @endif

                            <h2 class="title">{{ $document->judul }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <time datetime="{{ $document->created_at }}">
                                            {{ $document->created_at->format('M d, Y') }}
                                        </time>
                                    </li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $document->deskripsi !!}
                            </div><!-- End content -->

                            @if ($document->link)
                                <div class="mt-3">
                                    <a href="{{ $document->link }}" target="_blank" class="btn btn-primary">
                                        Lihat Dokumen
                                    </a>
                                </div>
                            @endif

                        </article>

                    </div>
                </section><!-- /Document Details Section -->

            </div>

        </div>
    </div>
@endsection
