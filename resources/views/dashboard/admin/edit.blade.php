@extends('layouts.master')

@section('title', 'Edit Admin')

@section('pageTitle', 'admins')

@section('activeTitle', 'edit')

@section('content')
 {{-- //هان في الفورم فش ميثود اسمها بوت ي اما جيت او بوست القيمة الافتراضية في حال وضعت قيمة غير الجيت و البوست هي الجيت --}}
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('admins.update' , $admins->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('dashboard.admin.__form' , [
                'button' => 'Update',
            ])
        </form>
    </div>
@endsection
