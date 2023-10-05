@extends('layouts.master')

@section('title', 'Index Fees')

@section('CssFile')
    <link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                <th>#</th>
                <th>{{ __('Student.Name') }}</th>
                <th>{{ __('Student.Grade') }}</th>
                <th>{{ __('Student.Classrooms') }}</th>
                <th>{{ __('Invoice.fee') }}</th>
                <th>{{ __('Invoice.amount') }}</th>
                <th>{{ __('Invoice.desc') }}</th>
                <th>{{ __('section.created') }}</th>
                <th>{{ __('Invoice.date_invoice') }}</th>
                <th>{{ __('grade.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>
                        {{ $invoice->id }}
                    </td>
                    <td>
                        {{ $invoice->student->name }}
                    </td>
                    <td>
                        {{ $invoice->grade->name }}
                    </td>
                    <td>
                        {{ $invoice->classroom->name }}
                    </td>
                    <td>
                        {{ $invoice->fee->title }}
                    </td>
                    <td>
                        {{ $invoice->amount }}
                    </td>
                    <td>
                        {{ $invoice->description }}
                    </td>
                    <td>
                        {{ $invoice->admin_data['name'] }}
                    </td>
                    <td>
                        {{ $invoice->created_at }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal_{{ $invoice->id }}">
                            <i class="fas fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_{{ $invoice->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            {{ __('app.delete_item') }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('app.want_delete_the_item') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">{{ __('app.Close') }}</button>
                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i> {{ __('app.Delete') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $invoices->links() }}
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
