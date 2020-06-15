<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Hidden Italy') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link 
            rel="dns-prefetch" 
            href="//fonts.gstatic.com"
        />
        
        <link 
            href="https://fonts.googleapis.com/css?family=Nunito" 
            rel="stylesheet"
        />
        
        <link 
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Round"
        />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
        />

        <style>
        a {
            text-decoration: none
        }

        a:hover {
            text-decoration: none
        }

        a .animated-icon {
            transition: 0.2s;
        }

        a:hover .animated-icon {
            transform: rotate(0deg) scale(1);
        }

        .rotate {
            transform: rotate(90deg) scale(0.75);
        }
        </style>
    </head>

    <body class="bg-primary">
        @yield('main')

        @include('components.footer')
    </body>

</html>
