@extends('layouts.master')

@section('title', 'Show Student')

@section('content')
    <section style="background-color: #eee;">
        <div class="container mb-4 py-5">
            <div class="mb-2">
                <h3 class="card-title">{{ __('Fee.Show_Fee') }}</h3>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Fee.Title') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $fees->title }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Fee.amount') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $fees->amount }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Fee.grade_name') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $fees->grade->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('section.classroom_name') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $fees->classroom->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Fee.year') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $fees->year }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Fee.desc') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $fees->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- __('app.update') --}}

@section('JsFile')
@endsection
