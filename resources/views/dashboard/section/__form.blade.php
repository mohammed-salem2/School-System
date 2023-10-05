<div class="form">
    <div class="form-group">
        <x-dashboard.input-form name="name" label="{{ __('grade.name_ar') }}" :value="$sections->getTranslation('name', 'ar')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="name_en" label="{{ __('grade.name_en') }}" :value="$sections->getTranslation('name', 'en')" />
    </div>
    <div class="form-group">
        <label for="grade_id">{{ __('classroom.choose_grade') }}</label>
            <select class="form-select col-12 @error('grade_id')
            is-invalid
        @enderror" id="'grade_id" name="grade_id" onchange="console.log($(this).val())" >
                <option value=" ">{{ __('classroom.choose_grade') }}</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id}}" @if($grade->id == old('grade_id' , $sections->grade_id)) selected @endif >
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
            <option value=" ">
                {{ __('section.choose_classroom') }}
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="teacher_id[]">{{ trans('section.Name_Teacher') }}</label>
        <select multiple name="teacher_id[]" class="form-select" id="exampleFormControlSelect2">
            @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <x-dashboard.select-fix-form name="status" label="Choose Status" :status="$sections->status" />
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admins.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
