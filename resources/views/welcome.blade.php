<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body class="full-height">
        <div class="home-content flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <img id="logo-big" src="storage\images\Hi.svg" alt="Logo Hidden Italy">
                <div class="title m-b-md">
                    Hidden Italy
                </div>
                <div class="subtitle m-b-md">
                    A New Way to Discover your surroundings
                </div>
            </div>
        </div>
        <footer class="page-footer font-small">
            @include('includes.footer')
        </footer>
    </body>

</html>
