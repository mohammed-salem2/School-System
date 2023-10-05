@extends('layouts.master')

@section('title', 'Create Grade')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('grade.create_grade') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('grades.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('dashboard.grade.__form' , [
                'button' => __('app.store'),
            ])
        </form>
    </div>
@endsection
