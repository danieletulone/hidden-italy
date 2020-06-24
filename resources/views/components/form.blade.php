<form id="{{ $id }}" method="{{ $method == 'DELETE' ? 'POST' : $method }}" action="{{ $action }}" @if ($enctype) enctype="{{ $enctype }}" @endif>
    @csrf

    @if ($method == 'DELETE')
        @method('DELETE')
    @endif

    {{ $slot }}

    @if ($showButton)
        @if ($method == 'DELETE')
        @yield('delete-button')
        @else
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary btn-circle btn-sm" role="button">{{ __('forms.' . $btnText) }}</button>
        </div>
        @endif
    @endif

    @yield('bottom')
</form>
