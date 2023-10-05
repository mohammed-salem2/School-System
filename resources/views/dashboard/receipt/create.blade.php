@extends('layouts.master')

@section('title', 'Create Grade')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('app.create_receipt') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('receipts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('dashboard.receipt.__form' , [
                'button' => __('app.store'),
            ])
        </form>
    </div>
@endsection
