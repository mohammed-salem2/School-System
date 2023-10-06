@extends('layouts.master')

@section('title', 'Index Admins')

@section('CssFile')
    <link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">{{ __('app.students_table') }}</h3>
                <div class="card-toolbar">
                        <a href="{{ route('students.create') }}" type="submit"
                            class="btn btn-info">{{ __('Student.Add_Student') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow-sm mt-3">
            <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">{{ __('app.filters') }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ URL::current() }}" method="get">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <label for="name" class="mb-1 ps-1 text-black">{{ __('app.Filter By Name') }}</label>
                            <input class="form-control form-control-sm mb-1" type="text" name="name"
                                value="{{ request()->query('name') }}" placeholder="{{ __('app.Filter By Name') }}" />
                            {{--  @if (count($datas) <= 0) disabled @endif  --}}
                        </div>
                        {{-- <div class="col-12 col-md-3">
                        <label for="grade_name" class="mb-1 ps-1 text-black">{{ __('app.Filter By Name') }}</label>
                        <input class="form-control form-control-sm mb-1" type="text" name="grade_name"
                            value="{{ request()->query('grade_name') }}" placeholder="{{ __('app.Filter By Name') }}"/>
                    </div> --}}
                        <div class="col-12 col-md-3">
                            <label for="status" class="mb-1 ps-1 text-black">{{ __('app.Filter By Status') }}</label>
                            <div class="input-group input-group-sm">
                                <select name="status" id="status" class="form-select form-select-sm">
                                    <option value="">{{ __('app.All') }}</option>
                                    <option value="active" @selected('active' == request('status'))>
                                        {{ __('app.Active') }}</option>
                                    <option value="draft" @selected('draft' == request('status'))>
                                        {{ __('app.Draft') }}</option>
                                </select>
                                <button class="btn btn-dark" type="submit">
                                    {{ __('app.filter') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- Hidden Submit Button --}}
                    <button class="btn btn-sm btn-dark d-none" type="submit">Filter</button>
                </form>
            </div>
        </div>
    </div>
    <div>
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
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ __('grade.Actions') }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item alert-info"
                                            href="{{ route('students.edit', $student->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i> {{ __('app.Edit') }}</a></li>
                                    <li><a class="dropdown-item alert-success"
                                            href="{{ route('students.show', $student->id) }}"><i class="fas fa-eye"></i>
                                            {{ __('app.Show') }}</a></li>
                                    <li> <button type="button" class="dropdown-item alert-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal_{{ $student->id }}">
                                            <i class="fa-solid fa-graduation-cap"></i> {{ __('app.Graduation') }}
                                        </button></li>
                                    <li><a class="dropdown-item alert-success"
                                            href="{{ route('invoice.create_invoice', $student->id) }}"><i
                                                class="fa-solid fa-file-invoice"></i>
                                            {{ __('app.Invoice') }}</a></li>
                                    <li><a class="dropdown-item alert-primary"
                                            href="{{ route('receipts.show', $student->id) }}"><i
                                                class="fa-solid fa-file-invoice"></i>
                                            {{ __('app.Receipt') }}</a></li>
                                    <li><a class="dropdown-item alert-info"
                                            href="{{ route('processes.show', $student->id) }}"><i
                                                class="fa-solid fa-file-invoice"></i>
                                            {{ __('app.exclude_fees') }}</a></li>
                                    <li><a class="dropdown-item alert-primary"
                                            href="{{ route('payments.show', $student->id) }}"><i
                                                class="fa-solid fa-file-invoice"></i>
                                            {{ __('app.payment') }}</a></li>



                                </ul>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_{{ $student->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                {{ __('app.student_graduation') }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __('app.want_graduating_the_item') }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa-solid fa-graduation-cap"></i> {{ __('app.Graduating') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="actions">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-eye"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal_{{ $student->id }}">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_{{ $student->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                {{ __('app.student_graduation') }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __('app.want_graduating_the_item') }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa-solid fa-graduation-cap"></i>  {{ __('app.Graduating') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
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
