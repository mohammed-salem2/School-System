<div class="form">
    <div>
        <h3 class="mt-3">{{ __('app.old_grade') }}</h3>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-3">
            <x-dashboard.select-form name="from_grade"
                label="{{ __('Student.grade') }}"
                firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$grades" :parent-id="$promotions->from_grade" />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="from_classroom">{{ __('section.choose_classroom') }}</label>
            <select id="from_classroom" name="from_classroom" class="form-select">

            </select>
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="from_section">{{ __('Student.Section') }}</label>
            <select id="from_section" name="from_section" class="form-select">

            </select>
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="academic_year">{{trans('Student.academic_year')}}</label>
            <select class="form-select mr-sm-2" name="academic_year_old">
                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                @php
                    $current_year = date("Y");
                @endphp
                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                    <option value="{{ $year}}">{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>
    <hr>
    <div>
        <h3 class="mt-5">{{ __('app.new_grade') }}</h3>
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-3">
            <x-dashboard.select-form name="to_grade"
                label="{{ __('Student.grade') }}"
                firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$grades" :parent-id="$promotions->to_grade" />
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="to_classroom">{{ __('section.choose_classroom') }}</label>
            <select id="to_classroom" name="to_classroom" class="form-select">

            </select>
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="to_section">{{ __('Student.Section') }}</label>
            <select id="to_section" name="to_section" class="form-select">

            </select>
        </div>
        <div class="form-group col-12 col-md-3">
            <label for="academic_year">{{trans('Student.academic_year')}}</label>
            <select class="form-select mr-sm-2" name="academic_year_new">
                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                @php
                    $current_year = date("Y");
                @endphp
                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                    <option value="{{ $year}}">{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
