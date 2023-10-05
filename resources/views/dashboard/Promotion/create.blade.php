@extends('layouts.master')

@section('title', 'Create')

@section('CssFile')
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('sidebar.Students_Promotions') }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('dashboard.promotion.__form', [
            'button' => __('app.store'),
        ])
    </form>
</div>
@endsection

@section('JsFile')
<script>
    $(document).ready(function () {
        $('select[name="from_grade"]').on('change', function () {
            var from_grade = $(this).val();
            if (from_grade) {
                $.ajax({
                    url: "{{ URL::to('dashboard/classes') }}/" + from_grade,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="from_classroom"]').empty();
                        $('select[name="from_classroom"]').append('<option value=" ">{{ __('section.choose_classroom') }}</option>');
                        $.each(data, function (key, value) {
                            $('select[name="from_classroom"]').append('<option value="' + key + '">' + value + '</option>');
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
        $('select[name="to_grade"]').on('change', function () {
            var to_grade = $(this).val();
            if (to_grade) {
                $.ajax({
                    url: "{{ URL::to('dashboard/classes') }}/" + to_grade,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="to_classroom"]').empty();
                        $('select[name="to_classroom"]').append('<option value=" ">{{ __('section.choose_classroom') }}</option>');
                        $.each(data, function (key, value) {
                            $('select[name="to_classroom"]').append('<option value="' + key + '">' + value + '</option>');
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
        $('select[name="from_classroom"]').on('change', function () {
            var from_classroom = $(this).val();
            if (from_classroom) {
                $.ajax({
                    url: "{{ URL::to('dashboard/getsection') }}/" + from_classroom,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="from_section"]').empty();
                        $('select[name="from_section"]').append('<option value=" ">{{ __('Student.Section') }}</option>');
                        $.each(data, function (key, value) {
                            $('select[name="from_section"]').append('<option value="' + key + '">' + value + '</option>');
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
        $('select[name="to_classroom"]').on('change', function () {
            var to_classroom = $(this).val();
            if (to_classroom) {
                $.ajax({
                    url: "{{ URL::to('dashboard/getsection') }}/" + to_classroom,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="to_section"]').empty();
                        $('select[name="to_section"]').append('<option value=" ">{{ __('Student.Section') }}</option>');
                        $.each(data, function (key, value) {
                            $('select[name="to_section"]').append('<option value="' + key + '">' + value + '</option>');
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
