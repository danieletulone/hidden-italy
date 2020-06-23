@extends('layouts.site')

@section('main')
    <div style="height:100vh" class="d-flex flex-column">
        <div class="row">
            <div class="col-4 p-4">
                
            </div>
            
            <div class="col-4 p-4 d-flex align-items-center justify-content-center flex-column">
                <img width="80px" class="p-2" src="storage\assets\Hi.svg" alt="Logo Hidden Italy">
                <span class="text-uppercase" style="letter-spacing:1px;font-size:12px">Discover your Italy</span>
            </div>

            <div class="col-4 p-4 px-5 d-flex align-items-center justify-content-end">
                @if (Route::has('login'))   
                    <div class="d-flex">
                        @guest
                            <a class="btn rounded-pill btn-primary mx-2" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a class="btn rounded-pill border mx-2" href="{{ route('register') }}">Register</a>
                            @endif
                        @endguest
                    </div>
                @endif
            </div>
        </div>
        

        <div class="d-flex align-items-center justify-content-center flex-column h-100" style="background-image: url({{ asset('storage/assets/rome.jpg') }});background-position:bottom center;background-size: 100% auto;background-repeat: no-repeat;">

        </div>
    </div>

    <div class="container-fluid bg-secondary py-5">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-12 text-center text-white">
                    <h1 class="font-weight-700" style="font-family: 'Playfair Display', serif;letter-spacing:1px;">A new way of loving Italy</h1>
                    <p class="text-uppercase mt-3 mb-5" style="letter-spacing:1px;font-size:12px">discover monuments, legends, <i>hidden</i> monuments</p>
                    <a href="#" class="btn btn-light rounded-pill">DOWNLOAD for iOS</a>
                    <br><span><small>for <b>FREE</b></small></span>
                </div>
            </div>
        </div>
    </div>

     <div class="container-fluid bg-primary py-5">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-12 text-center text-white">
                    <h1 class="font-weight-700" style="font-family: 'Playfair Display', serif;letter-spacing:1px;">Create your account</h1>
                    <p class="text-uppercase mt-3 mb-5" style="letter-spacing:1px;font-size:12px">Quickly accounting from this site and login quickly from your iphone</p>
                    <a href="#" class="btn btn-light rounded-pill">CREATE ACCOUNT</a>
                    <br><span><small>for <b>FREE</b></small></span>
                </div>
            </div>
        </div>
    </div>
@endsection

