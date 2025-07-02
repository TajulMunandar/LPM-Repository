<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('logo1.png') }}" alt="">

        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="https://karirlink.page.link/mrWCqrfGfxZMYTpq7">Tracer Study</a></li>
                <li class="dropdown"><a href="#"><span>Survei</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="https://karirlink.page.link/GawLu3nhARahBfsg8" style="font-size: 13px">Survei
                                Pengguna Lulusan</a></li>
                    </ul>
                </li>
                <li><a href="https://bkd.iaintakengon.web.id/3.0/index.php">BKD</a></li>
                <li class="dropdown"><a href="#"><span>Akreditasi</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="/document?jenis=4" style="font-size: 13px">Sertifikat Akreditasi</a></li>
                        <li><a href="/document?jenis=5" style="font-size: 13px">Instrumen Akreditasi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Document</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="/document?jenis=1" style="font-size: 13px">Pusat Audit dan Pengendalian Mutu</a>
                        </li>
                        <li><a href="/document?jenis=2" style="font-size: 13px">Pusat Pengembangan Standar Mutu
                                Akademik</a></li>
                        <li><a href="/document?jenis=3" style="font-size: 13px">Pusat Pengembangan Standar Mutu Non
                                Akademik</a></li>
                    </ul>
                </li>

                <li><a href="/news">News</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @if (auth()->user())
            <form action="{{ route('logout') }}" method="POST" class="ms-5">
                @csrf
                <button type="submit" class="btn btn-danger ">

                    <span>Logout</span>
                </button>
            </form>
        @else
            <a class="btn-getstarted" href="/login">Sign In</a>
        @endif

    </div>
</header>
