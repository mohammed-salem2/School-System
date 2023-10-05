<div class="form">
    <div class="form-group">
        <x-dashboard.input-form name="title" label="{{ __('grade.name_ar') }}" :value="$fees->getTranslation('title', 'ar')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="title_en" label="{{ __('grade.name_en') }}" :value="$fees->getTranslation('title', 'en')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-number name="amount" min="0" label="{{ __('Fee.amount') }}" :value="$fees->amount" />
    </div>
    <div class="form-group">
        <label for="grade_id">{{ __('classroom.choose_grade') }}</label>
            <select class="form-select col-12 @error('grade_id')
            is-invalid
        @enderror" id="'grade_id" name="grade_id" onchange="console.log($(this).val())" >
                <option value=" ">{{ __('classroom.choose_grade') }}</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id}}" @if($grade->id == old('grade_id' , $fees->grade_id)) selected @endif >
                        {{ $grade->name }}</option>
                @endforeach
            </select>
            @error('grade_id')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
    </div>
    <div class="form-group">
        <label for="classroom_id">{{ __('section.choose_classroom') }}</label>
        <select id="classroom_id" name="classroom_id" class="form-select">

        </select>
    </div>
    <div class="form-group">
        <label for="year">{{trans('Fee.year')}}</label>
        <select class="form-select mr-sm-2" name="year">
            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
            @php
                $current_year = date("Y");
            @endphp
            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                <option value="{{ $year}}">{{ $year }}</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <x-dashboard.text-area-form name="description" label="{{ __('Fee.desc') }}" :value="$fees->description" />
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('fees.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
