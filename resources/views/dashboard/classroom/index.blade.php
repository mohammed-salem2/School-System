@extends('layouts.master')

@section('title', 'Index Admins')

@section('CssFile')
<link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
{{-- <div class="card card-docs mb-2" style="padding: 20px;">
    <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                <th>#</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>zxzxz</td>
                <td>dfgdf</td>
            </tr>
        </tbody>
    </table>
</div> --}}
<x-dashboard.table title="Classrooms Table" :ths="['#', __('classroom.Name') , __('classroom.Grade_name') , __('classroom.created')  , __('classroom.Actions')]"
:models="$classrooms"
edit="classrooms.edit"
show="classrooms.show"
destory="classrooms.destroy"
index="classrooms.index"
create="classrooms.create"
:values="['id', 'name', 'forign_id' , 'created']"
name="{{ __('classroom.create_new_class') }}"
modeltitle="{{ __('app.delete_item') }}"
filters="false"
relation="grade"
table="classroom"
/>
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
