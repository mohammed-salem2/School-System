@extends('layouts.master')

@section('title', 'Graduation Student')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('app.student_graduation') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('graduation') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form">
                <div class="row">
                    <div class="form-group col-12 col-md-4">
                        <x-dashboard.select-form name="grade_id"
                            label="{{ __('Student.grade') }}"
                            firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$grades" :parent-id="null" />
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="classroom_id">{{ __('section.choose_classroom') }}</label>
                        <select id="classroom_id" name="classroom_id" class="form-select">

                        </select>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="section_id">{{ __('Student.Section') }}</label>
                        <select id="section_id" name="section_id" class="form-select">

                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-2">
                <button type="submit" class="btn btn-primary">{{ __('app.Graduating') }}</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
            </div>
        </form>
    </div>
@endsection

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
                        $('select[name="classroom_id"]').append('<option value=" ">{{ __('section.choose_classroom') }}</option>');
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

<script>
    $(document).ready(function () {
        $('select[name="classroom_id"]').on('change', function () {
            var classroom_id = $(this).val();
            if (classroom_id) {
                $.ajax({
                    url: "{{ URL::to('dashboard/getsection') }}/" + classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $('select[name="section_id"]').append('<option value=" ">{{ __('Student.Section') }}</option>');
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
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
