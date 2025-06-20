@extends('main.layout.main')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    class="img-fluid">
                            </div>

                            <h2 class="title">{{ $berita->judul }}</h2>
                            </h2>

                            <div class="meta-top">
                                <ul>

                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                        <time datetime="{{ $berita->created_at }}">
                                            {{ $berita->created_at->format('M d, Y') }}</time>
                                    </li>

                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $berita->isi !!}
                            </div><!-- End post content -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->


            </div>

        </div>
    </div>
@endsection
