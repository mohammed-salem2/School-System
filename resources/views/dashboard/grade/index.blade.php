@extends('layouts.master')

@section('title', 'Index Admins')

@section('CssFile')
    <link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <x-dashboard.table title="Grade Table"
    :ths="['#', __('grade.Name'), __('grade.Note'), __('grade.Actions')]"
    :models="$grades"
    edit="grades.edit"
    show="grades.show"
    destory="grades.destroy"
    index="grades.index"
    create="grades.create"
    :values="['id', 'name', 'note']"
    name="{{ __('grade.create_new_grades') }}"
    modeltitle="{{ __('app.delete_item') }}"
    :text_filters="[['name' => 'name', 'label' => 'Filter By Name', 'cols' => '4']]"
    table="grade" />
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
