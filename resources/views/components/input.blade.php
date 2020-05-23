<div class="form-group">
    <label>{{ __('forms.' . $placeholder) }}</label>
    <input 
        class="form-control @error($name) is-invalid @enderror border-primary"
        name="{{ $name }}" 
        type="{{ $type }}"
        placeholder="{{ __('forms.' . $placeholder) }}"
        @if (old($name))
            value="{{ old($name) }}"
        @endif
    />

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>