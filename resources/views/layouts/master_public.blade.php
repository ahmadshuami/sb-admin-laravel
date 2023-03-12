<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="SB Admin Laravel">
    <meta name="author" content="shuamilabs">

    <title>{{ config('app.name', 'SB Admin Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    @vite('resources/js/app.js')

    @stack('style')
</head>
<body>
    <div id="app">
        @include('layouts.public_layouts.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script type="text/javascript">
        function aos_init() {
            Aos.init({
                duration: 1000,
                easing: "ease-in-out",
                once: false,
                mirror: false
            });
        }
        window.addEventListener('load', () => {
            aos_init();
        });
    </script>

    @stack('script')
</body>
</html>
