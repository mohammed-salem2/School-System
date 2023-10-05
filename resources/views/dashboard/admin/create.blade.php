@extends('layouts.master')

@section('title', 'Create Admin')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('dashboard.admin.__form' , [
                'button' => 'Store',
            ])
        </form>
    </div>
@endsection
