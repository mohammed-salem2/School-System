@extends('layouts.master')

@section('title', 'Index Admins')

@section('CssFile')
<link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<x-dashboard.table title="Sections Table" :ths="['#', __('section.Name') , __('section.grade_name') ,  __('section.classroom_name') , __('section.status') , __('section.created') ,  __('grade.Actions')]"
:models="$sections"
edit="sections.edit"
show="sections.show"
destory="sections.destroy"
index="sections.index"
create="sections.create"
:values="['id', 'name', 'forign_id' , 'forign_id_two' , 'status' , 'created']"
name="{{ __('section.create_new_sections') }}"
modeltitle="{{ __('app.delete_item') }}"
relation="grade"
filters="false"
relationtwo="classroom"
table="grade"
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
