<label for="{{ $id ?? $name }}">{{ __($label) }}</label>
        <input type="{{ $type ?? 'text' }}" class="form-control col-{{ $col ?? '12' }} @error($name)
            is-invalid
        @enderror" @if($name=="image")
        multiple
        @endif id="{{ $id ?? $name }}" name="{{ $name }}" placeholder="{{ $label }}"
        value="{{ old($name, $value ?? null) }}" >
            @error($name)
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
