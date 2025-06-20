<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('logo1.png') }}" alt="">

        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li class="dropdown"><a href="about.html"><span>Document</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="team.html">Pusat Audit Mutu</a></li>
                        <li><a href="testimonials.html" style="font-size: 13px">Pusat Pengembangan Standart
                                Mutu Akademik</a></li>
                        <li><a href="testimonials.html" style="font-size: 13px">Pusat Pengembangan Standart
                                Mutu Non Akademik</a></li>
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
