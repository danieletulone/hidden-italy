@if (Request::is("admin*") && auth()->user() != null && auth()->user()->hasScope("use-admin-dashboard"))
    @php 
        $layout = 'layouts.dashboard';
        $section = 'content';
    @endphp
@else
    @php 
        $layout = 'layouts.site';
        $section = 'main';
    @endphp
@endif

@extends($layout)

@section($section)
    <div class="container-fluid @if($section == 'main') bg-primary @endif">
        <div 
            class="d-flex align-items-center justify-content-center" 
            style="@if($section == 'main') min-height:calc(100vh - 142px) @else min-height:500px @endif"
            >

            <div class="text-center @if($section == 'main') text-white @endif">
                <h1 class="display-1 font-weight-bold">@yield("code")</h1>
                <p>@yield('message')</p>

                <a class="btn btn-light rounded-pill mt-3" href="{{ route('home') }}">Vai alla home</a>
            </div>
        </div>
    </div>
@endsection