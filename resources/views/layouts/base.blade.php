<!Doctype Html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('storage/assets/favicon/apple-touch-icon.png') }}" />
        <link rel="icon" type="image/x-icon" sizes="32x32" href="{{ URL::asset('storage/assets/favicon/favicon-32x32.png') }}" />
        <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ URL::asset('storage/assets/favicon/favicon-16x16.png') }}" />
        <link rel="icon" type="image/x-icon" href="{{ URL::asset('storage/assets/favicon/favicon-16x16.png') }}" />
        <link rel="manifest" href="{{ URL::asset('storage/assets/favicon/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ URL::asset('storage/assets/favicon/safari-pinned-tab.svg') }}" color="#486aec">
        <meta name="msapplication-TileColor" content="#2d89ef">
        <meta name="theme-color" content="#ffffff">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Hidden Italy') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="//fonts.gstatic.com" rel="dns-prefetch" />
        <link href="https://fonts.googleapis.com/css?family=Nunito|Playfair+Display:wght@500;700&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Round" rel="stylesheet" />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body @if (isset($bg)) class="{{ $bg }}" @endif>
        @yield('main')

        @yield('footer')
    </body>
</html>
