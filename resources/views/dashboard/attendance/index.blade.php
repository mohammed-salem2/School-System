@extends('layouts.master')

@section('title', 'Index Admins')

@section('CssFile')
    <link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                <th>#</th>
                <th>{{ __('section.Name') }}</th>
                <th>{{ __('section.grade_name') }}</th>
                <th>{{ __('section.classroom_name') }}</th>
                <th>{{ __('section.status') }}</th>
                <th>{{ __('section.created') }}</th>
                <th>{{ __('grade.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
                <tr>
                    <td>
                        {{ $section->id }}
                    </td>
                    <td>
                        {{ $section->name }}
                    </td>
                    <td>
                        {{ $section->grade->name }}
                    </td>
                    <td>
                        {{ $section->classroom->name }}
                    </td>
                    <td>
                        @if ($section->status == 'active')
                            <div class="badge badge-success">
                                {{ $section->status }}
                            </div>
                        @else
                            <div class="badge badge-danger">
                                {{ $section->status }}
                            </div>
                        @endif
                    </td>
                    <td>
                        {{ $section->admin_data['name'] }}
                    </td>
                    <td>
                        <a href="{{ route('show-student', $section->id) }}" class="btn btn-sm btn-info">
                            {{ __('app.student_list') }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $sections->links() }}
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
