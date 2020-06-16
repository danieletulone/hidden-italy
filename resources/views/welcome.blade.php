@extends('layouts.site')

@section('main')
    <div style="height:100vh" class="d-flex flex-column">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth

                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-center flex-column h-100">
            <img id="logo-big" src="storage\assets\Hi.svg" alt="Logo Hidden Italy">
            
            <div class="title m-b-md">
                Hidden Italy
            </div>

            <div class="subtitle m-b-md">
                A New Way to Discover your surroundings
            </div>
        </div>
    </div>
@endsection

