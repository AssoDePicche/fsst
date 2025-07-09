<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        class="form-control"
        {{ $required ? 'required' : '' }}
    />

    @error($name)
        <span class="form-text">{{ $message }}</span>
    @enderror
</div>
