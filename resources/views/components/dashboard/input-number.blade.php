<label for="{{ $id ?? $name }}">{{ __($label) }}</label>
        <input type="number" class="form-control col-{{ $col ?? '12' }} @error($name)
            is-invalid
        @enderror" id="{{ $id ?? $name }}" min={{ $min }} name="{{ $name }}" placeholder="{{ $label }}"
        value="{{ old($name, $value ?? null) }}">
            @error($name)
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
