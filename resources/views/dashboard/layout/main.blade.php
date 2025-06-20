<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.layout.head')
    <style>
        /* Warna font putih untuk halaman aktif */
        .dataTables_wrapper .dataTables_paginate .page-item.active .page-link {

            /* Background biru */
            color: white !important;
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    @include('dashboard.layout.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('dashboard.layout.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </main>

    @include('dashboard.layout.script')
    @yield('script')
</body>

</html>
