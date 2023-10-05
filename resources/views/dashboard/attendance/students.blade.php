@extends('layouts.master')

@section('title', 'Index Admins')

@section('CssFile')
    <link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <h5 style="font-family: 'Cairo', sans-serif; color:blue;"> <span
            style="font-family: 'Cairo', sans-serif; color:black;">{{ __('app.today_date') }}</span>: {{ date('Y-m-d') }}
    </h5>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                    <th>#</th>
                    <th>{{ __('Student.Name') }}</th>
                    <th>{{ __('Student.email') }}</th>
                    <th>{{ __('Student.Grade') }}</th>
                    <th>{{ __('Student.Classrooms') }}</th>
                    <th>{{ __('Student.section') }}</th>
                    <th>{{ __('Student.parent') }}</th>
                    <th>{{ __('Student.Status') }}</th>
                    <th>{{ __('Student.gender') }}</th>
                    <th>{{ __('section.created') }}</th>
                    <th>{{ __('grade.Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            {{ $student->id }}
                        </td>
                        <td>
                            {{ $student->name }}
                        </td>
                        <td>
                            {{ $student->email }}
                        </td>
                        <td>
                            {{ $student->grade->name }}
                        </td>
                        <td>
                            {{ $student->classroom->name }}
                        </td>
                        <td>
                            {{ $student->section->name }}
                        </td>
                        <td>
                            {{ $student->parent->name_father }}
                        </td>
                        <td>
                            @if ($student->status == 'active')
                                <div class="badge badge-success">
                                    {{ $student->status }}
                                </div>
                            @else
                                <div class="badge badge-danger">
                                    {{ $student->status }}
                                </div>
                            @endif
                        </td>
                        <td>
                            {{ $student->gender }}
                        </td>
                        <td>
                            {{ $student->admin_data['name'] }}
                        </td>
                        <td>
                            @if (isset($student->attendances()->where('attendance_date', date('Y-m-d'))->first()->student_id))
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input name="attendences[{{ $student->id }}]" disabled
                                        {{ $student->attendances()->first()->attendance_status == 1 ? 'checked' : '' }}
                                        class="leading-tight" type="radio" value="presence">
                                    <span class="text-success">حضور</span>
                                </label>

                                <label class="ml-4 block text-gray-500 font-semibold">
                                    <input name="attendences[{{ $student->id }}]" disabled
                                        {{ $student->attendances()->first()->attendance_status == 0 ? 'checked' : '' }}
                                        class="leading-tight" type="radio" value="absent">
                                    <span class="text-danger">غياب</span>
                                </label>
                            @else
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                        value="presence">
                                    <span class="text-success">حضور</span>
                                </label>

                                <label class="ml-4 block text-gray-500 font-semibold">
                                    <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                        value="absent">
                                    <span class="text-danger">غياب</span>
                                </label>
                            @endif

                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                            <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                            <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <button class="btn btn-success" type="submit">{{ trans('app.confirm') }}</button>
        </table>
    </form>
@endsection


@section('JsFile')
    <script src="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>

@endsection
