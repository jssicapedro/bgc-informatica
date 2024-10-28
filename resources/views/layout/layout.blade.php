<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('img/nav/logotipo.png') }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('links')
</head>

<body>
    <!-- ======= Header ======= -->
    @include('layout.nav')

    <!-- ======= Main ======= -->
    <main>
        @yield('main')
    </main>

    <!-- ======= Footer ======= -->
    @include('layout.footer')
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>