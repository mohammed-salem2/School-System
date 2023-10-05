@extends('layouts.master')

@section('title', 'Edit Grade')

@section('content')
 {{-- //هان في الفورم فش ميثود اسمها بوت ي اما جيت او بوست القيمة الافتراضية في حال وضعت قيمة غير الجيت و البوست هي الجيت --}}
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('section.edit_section') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('sections.update' , $sections->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

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
                        <option value="{{ $sections->classroom_id }}">
                            {{ $sections->classroom->name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">{{ trans('section.Name_Teacher') }}</label>
                    <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                        @foreach($teachers as $teach)
                        <option @foreach ($sections->teachers as $teacher )
                            @if ($teach->id == $teacher->id)
                                selected
                            @endif
                        @endforeach value="{{$teach->id}}">{{$teach->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-dashboard.select-fix-form name="status" label="Choose Status" :status="$sections->status" />
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> {{ __('app.update') }}</button>
                <a href="{{ route('sections.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
            </div>
        </form>
    </div>

@endsection
{{-- __('app.update') --}}

@section('JsFile')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('dashboard/classes') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="classroom_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>


@endsection
