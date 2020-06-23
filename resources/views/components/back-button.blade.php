<a href="{{ route($goTo) }}" style="position:absolute;top:-25px;left:50px;width:auto;height:50px;" class="text-white px-3 shadow-sm bg-info rounded-pill d-flex align-items-center justify-content-center">
    <img 
        src="{{ asset('icons/arrows.png') }}" 
        class="animated-icon mr-2" 
        width="25px" 
    />

    <span>{{ __('forms.back.' . $goTo) }}</span>
</a>
