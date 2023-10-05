<div class="form">
    <div class="form-group">
        <label for="student_id">{{ __('Student.Name') }}</label>
        <select class="form-select col-12 @error('student_id')
            is-invalid
        @enderror" id="student_id"
            name="student_id" >
                <option value="{{ $students->id }}" @if ($students->id == old('student_id', $processes->student_id)) selected @endif>
                    {{ $students->name }}</option>
        </select>
        @error('student_id')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <x-dashboard.input-number name="amount" min="0" label="{{ __('Invoice.amount') }}" :value="$processes->amount" />
    </div>
    <div class="form-group">
        <label for="balance">{{ __('app.balance') }}</label>
        <input type="text" class="form-control col-12 @error('balance')
            is-invalid
        @enderror" id="balance" name="balance" placeholder="{{ __('app.balance') }}"
        value="{{ $balance }}" disabled>
            @error('balance')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
    </div>
    <div class="form-group">
        <x-dashboard.text-area-form name="description" label="{{ __('Fee.desc') }}" :value="$processes->description" />
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admins.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
