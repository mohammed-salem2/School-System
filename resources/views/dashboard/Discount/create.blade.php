@extends('layouts.master')

@section('title', 'Create Fee')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Fee.create_new_dis') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('discounts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('dashboard.discount.__form' , [
                'button' => __('app.store'),
            ])
        </form>
    </div>
@endsection

@section('JsFile')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

{{-- <script>
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

</script> --}}


@endsection
