<div class="form-group">

    @if ($type == "double")
        <label>{{ __('forms.' . $name) }}</label>
    @else
        <label>{{ __('forms.' . $placeholder) }}</label>
    @endif

    <input
        class="form-control @error($name) is-invalid @enderror mb-3"
        name="{{ $name }}"
        type="{{ $type }}"
        
        @if ($type == "double")
            placeholder="{{ $placeholder }}"
        @else
            placeholder="{{ __('forms.' . $placeholder) }}"
        @endif

        @if (old($name))
            value="{{ old($name) }}"
        @elseif (isset($value))
            value="{{ $value }}"
        @endif
    />

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
