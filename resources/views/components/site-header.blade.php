<div class="container-fluid">
    <div class="row">
        <a href="{{ route('home') }}" class="offset-4 col-4 p-4 d-flex align-items-center justify-content-center flex-column">
            <img width="80px" class="p-2" src="storage\assets\Hi.svg" alt="Logo Hidden Italy">
            <span class="text-uppercase" style="letter-spacing:1px;font-size:12px">Discover your Italy</span>
        </a>

        <div class="col-4 p-4 px-5 d-flex align-items-center justify-content-end">
            @if (Route::has('login'))   
                <div class="d-flex align-items-center">
                    @guest
                        @if (!Request::is('login'))
                            <a class="btn rounded-pill btn-primary mx-2" href="{{ route('login') }}">Login</a>
                        @endif

                        @if (!Request::is('register'))
                            <a class="btn rounded-pill border mx-2" href="{{ route('register') }}">Register</a>
                        @endif
                    @else
                        @if (auth()->user()->hasScope('use-admin-dashboard'))
                            <a class="btn rounded-pill btn-primary mx-2" href="{{ route('dashboard.index') }}">Dashboard</a>
                        @endif

                        <div class="mr-2 ml-4 d-flex text-center">
                            <x-logout :visible="false" />
                        </div>
                    @endguest
                </div>
            @endif
        </div>
    </div>
</div>