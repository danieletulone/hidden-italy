<a href="{{ route($route) }}" class="my-0 mx-2 my-lg-2 mx-lg-0" @yield('script')>
    <i class="material-icons @if(Request::is('admin/' . $name . '*')) bg-success text-white @endif">{{ $icon }}</i>
    
    @if ($name != '' && $visible)
        <div>
            <small class="text-uppercase" style="font-size:8px">{{ $name }}</small>
        </div>
    @endif
</a>