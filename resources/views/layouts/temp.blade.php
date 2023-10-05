@extends('layouts.master')

@section('title', 'Home')

@section('CssFile')
@endsection

@section('content')
{{-- <div class="col-xl-3">
    <a href="{{ route('admins.index') }}" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
        <div class="card-body">
            <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                <i class="fas fa-user"></i>
            </span>
            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{ $admins_count }}</div>
            <div class="fw-bold text-gray-100">New Admins</div>
        </div>
    </a>
</div> --}}
@endsection

@section('JsFile')
@endsection
