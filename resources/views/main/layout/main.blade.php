<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LPM Repository</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    @include('main.layout.head')
</head>

<body class="index-page">

    @include('main.layout.navbar')

    <main class="main">
        @yield('content')
    </main>

    @include('main.layout.footer')
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    @include('main.layout.script')

</body>

</html>
