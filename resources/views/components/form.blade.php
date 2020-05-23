<form method="{{ $method }}" action="{{ $action }}" @if ($enctype) enctype="{{ $enctype }}" @endif>
    @csrf

    @if ($method == 'DELETE')
        @method('DELETE')
    @endif
    
    {{ $slot }}

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary" role="button">{{ __('forms.' . $btnText) }}</button>
    </div>
</form>