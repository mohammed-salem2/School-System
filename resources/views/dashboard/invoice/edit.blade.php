@extends('layouts.master')

@section('title', 'Edit Grade')

@section('content')
 {{-- //هان في الفورم فش ميثود اسمها بوت ي اما جيت او بوست القيمة الافتراضية في حال وضعت قيمة غير الجيت و البوست هي الجيت --}}
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Fee.edit_fee') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('fees.update' , $fees->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('dashboard.fee.__form' , [
                'button' => __('app.update'),
            ])
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
