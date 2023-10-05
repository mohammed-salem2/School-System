<div class="form">
    {{-- <div class="form-group">
        <x-dashboard.input-form name="student_id" label="{{ __('Student.Name') }}" :value="$students->id" readonly="true" />
    </div> --}}
    <div class="form-group">
        <label for="student_id">{{ __('Student.Name') }}</label>
        <select class="form-select col-12 @error('student_id')
            is-invalid
        @enderror" id="student_id"
            name="student_id" >
                <option value="{{ $students->id }}" @if ($students->id == old('student_id', $invoices->student_id)) selected @endif>
                    {{ $students->name }}</option>
        </select>
        @error('student_id')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="fee_id">{{ __('Invoice.choose_fee') }}</label>
        <select class="form-select col-12 @error('fee_id')
            is-invalid
        @enderror" id="fee_id"
            name="fee_id" >
            <option value=" ">{{ __('Invoice.choose_fee') }}</option>
            @foreach ($fees as $fee)
                <option value="{{ $fee->id }}" data-quantity="{{ $fee->amount }}" @if ($fee->id == old('fee_id', $invoices->fee_id)) selected @endif>
                    {{ $fee->title }}</option>
            @endforeach
        </select>
        @error('fee_id')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div id="AmountInput" style="display: none;">
        <label for="quantity">{{ __('Fee.amount') }}</label>
        <input class="form-control" type="number" id="amount" name="amount" readonly>
    </div>
    <div class="form-group">
        <x-dashboard.text-area-form name="description" label="{{ __('Fee.desc') }}" :value="$invoices->description" />
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
