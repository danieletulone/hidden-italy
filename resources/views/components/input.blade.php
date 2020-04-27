<div class="form-group">
    <label>{{ $placeholder }}</label>
    <input 
        class="form-control @error('email') is-invalid @enderror"
        name="{{ $name }}" 
        type="{{ $type }}"
        placeholder="{{ __($placeholder) }}"
    />

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>