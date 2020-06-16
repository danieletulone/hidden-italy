@if (Request::input($type) != null)
    <div class="badge badge-pill badge-primary"> 
        {{ $slot }}
        
        <a 
            href="{{ route('monuments.index', array_merge(Request::except($type))) }}"
            class="badge badge-pill badge-primary">
            
            <span>x</span>
        </a>
    </div>
@endif