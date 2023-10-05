@extends('layouts.master')

@section('title', 'Show Student')

@section('content')
    <section style="background-color: #eee;">
        <div class="container mb-4 py-5">
            <div class="mb-2">
                <h3 class="card-title">{{ __('Student.Show_Student') }}</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ $students->image_url }}"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 165px; height: 165px;">
                            <h5 class="my-3">
                                {{ $students->name }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.Name') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.email') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Parent_trans.National_ID_Father') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->national_id }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.Nationality') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->nationality->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.blood_type') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->blood->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Parent_trans.Religion_Father_id') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->religion->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.Grade') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->grade->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.Classrooms') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->classroom->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.section') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->section->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.father_name') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->parent->name_father }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.mother_name') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->parent->name_mother}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.Date_of_Birth') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->date_birth}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.Age') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->age_student}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.academic_year') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->academic_year}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('Student.gender') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $students->gender}}</p>
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
