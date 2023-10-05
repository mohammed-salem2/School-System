@extends('layouts.master')

@section('title', 'Index Promotions')

@section('CssFile')
    <link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        {{ __('app.undo_all') }}
    </button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('app.undo_all') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('promotions.undo') }}" method="post">
                        @csrf
                        @method('DELETE')

                        <input type="text" hidden name="page_id" value="0">
                        <h5 style="font-family: 'Cairo', sans-serif;">{{ __('app.are_you') }}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('app.Close') }}</button>
                    <button class="btn btn-danger">{{ trans('app.yes') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                <th>#</th>
                <th>{{ __('Student.Name') }}</th>
                <th>{{ __('Student.old_grade') }}</th>
                <th>{{ __('Student.old_classroom') }}</th>
                <th>{{ __('Student.old_section') }}</th>
                <th>{{ __('Student.academic_year_old') }}</th>
                <th>{{ __('Student.new_grade') }}</th>
                <th>{{ __('Student.new_classroom') }}</th>
                <th>{{ __('Student.new_section') }}</th>
                <th>{{ __('Student.academic_year_new') }}</th>
                <th>
                    {{ __('App.Actions') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($promotions as $promotion)
                <tr>
                    <td>{{ $promotion->id }}</td>
                    <td>{{ $promotion->student->name }}</td>
                    <td>{{ $promotion->FromGrade->name }}</td>
                    <td>{{ $promotion->FromClassroom->name }}</td>
                    <td>{{ $promotion->FromSection->name }}</td>
                    <td>{{ $promotion->academic_year_old }}</td>
                    <td>{{ $promotion->ToGrade->name }}</td>
                    <td>{{ $promotion->ToClassroom->name }}</td>
                    <td>{{ $promotion->ToSection->name }}</td>
                    <td>{{ $promotion->academic_year_new }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#undo{{ $promotion->id }}">
                            {{ __('app.undo') }}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="undo{{ $promotion->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('app.undo') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('promotions.undo') }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <input type="text" hidden name="page_id" value="{{ $promotion->id }}">
                                            <h5 style="font-family: 'Cairo', sans-serif;">{{ __('app.are_you') }}</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('app.Close') }}</button>
                                        <button class="btn btn-danger">{{ trans('app.yes') }}</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            {{ __('app.student_graduation') }}
                        </button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
