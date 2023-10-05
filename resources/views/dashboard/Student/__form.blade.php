<div class="form">
    <div class="form-group">
        <x-dashboard.input-form name="name" label="{{ __('Student.name_ar') }}" :value="$students->getTranslation('name', 'ar')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="name_en" label="{{ __('Student.name_en') }}" :value="$students->getTranslation('name', 'en')" />
    </div>
    <div class="form-group">
            <label for="inputCity">{{ __('Student.Nationality') }}</label>
            <select class="form-select my-1 mr-sm-2" data-control="select2"
                name="nationality_id">
                <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                @foreach ($nationalities as $national)
                    <option value="{{ $national->id }}"
                        @if ($national->id == old('nationality_mother_id', $students->nationality_id)) selected @endif>{{ $national->name }}
                    </option>
                @endforeach
            </select>
            @error('nationality_mother_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group">
        <x-dashboard.select-form name="blood_id"
            label="{{ __('Student.blood_type') }}"
            firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$bloods" :parent-id="$students->blood_id" />
    </div>
    <div class="form-group col">
        <x-dashboard.select-form name="religion_id"
            label="{{ __('Parent_trans.Religion_Father_id') }}"
            firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$religions" :parent-id="$students->religion_id" />
    </div>
    <div class="form-group col">
        <x-dashboard.select-form name="grade_id"
            label="{{ __('Student.grade') }}"
            firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$grades" :parent-id="$students->grade_id" />
    </div>
    <div class="form-group col">
        <label for="classroom_id">{{ __('section.choose_classroom') }}</label>
        <select id="classroom_id" name="classroom_id" class="form-select">

        </select>
    </div>
    <div class="form-group col">
        <label for="section_id">{{ __('Student.Section') }}</label>
        <select id="section_id" name="section_id" class="form-select">

        </select>
    </div>
    <div class="form-group">
        <label for="inputCity">{{ __('Student.Parent') }}</label>
        <select class="form-select my-1 mr-sm-2"
            name="parent_id">
            <option selected>{{ __('Student.Parent') }}</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}"
                    @if ($parent->id == old('parent_id', $students->parent_id)) selected @endif>
                    @if($parent->name_father != 'No data')
                    {{ $parent->name_father }}
                    @else
                    {{ $parent->name_mother }}
                    @endif
                </option>
            @endforeach
        </select>
        @error('nationality_mother_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
    <div class="form-group">
        <x-dashboard.select-fix-form name="status" label="{{ __('Student.Status') }}" :status="$students->status" />
    </div>
    <div class="form-group">
        <label for="gender">{{ __('Student.gender') }}</label>
        <select class="form-select @error('gender')
        is-invalid
    @enderror" id="gender" name="gender">
            <option value="male" @if (old('gender' , $students->gender) == 'male') selected @endif>Male</option>
            <option value="female" @if (old('gender' , $students->gender) == 'female') selected @endif>Female</option>
        </select>
        @error('gender')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <x-dashboard.input-form type="date" name="date_birth" label="{{ __('Student.Date_of_Birth') }}" :value="$students->date_birth" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="national_id"
            label="{{ __('Parent_trans.National_ID_Father') }}" :value="$students->national_id" />
    </div>
    <div class="form-group">
        <label for="academic_year">{{trans('Student.academic_year')}}</label>
        <select class="form-select mr-sm-2" name="academic_year">
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
        <x-dashboard.input-form type="file" name="image" label="{{ __('Teacher.Image') }}" />
    </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer mt-2">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
