@extends('layouts.master')

@section('title', 'Edit Grade')

@section('content')
 {{-- //هان في الفورم فش ميثود اسمها بوت ي اما جيت او بوست القيمة الافتراضية في حال وضعت قيمة غير الجيت و البوست هي الجيت --}}
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('grade.edit_grade') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('grades.update' , $grades->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('dashboard.grade.__form' , [
                'button' => __('app.update'),
            ])
        </form>
    </div>
@endsection
