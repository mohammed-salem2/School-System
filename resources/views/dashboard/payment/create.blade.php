@extends('layouts.master')

@section('title', 'Create Grade')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('app.payment') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('dashboard.payment.__form' , [
                'button' => __('app.store'),
            ])
        </form>
    </div>
@endsection
