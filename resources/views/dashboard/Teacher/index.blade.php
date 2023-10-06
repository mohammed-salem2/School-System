@extends('layouts.master')

@section('title', 'Index Admins')

@section('CssFile')
<link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<x-dashboard.table title="Teachers Table" :ths="['#', __('Teacher.Name_Teacher') , __('Teacher.Email') ,  __('Teacher.specialization') , __('Teacher.Gender') ,  __('Teacher.Status') , __('section.created') ,  __('grade.Actions')]"
:models="$teachers"
edit="teachers.edit"
show="teachers.show"
destory="teachers.destroy"
index="teachers.index"
create="teachers.create"
:values="['id', 'name', 'email' ,'forign_id' , 'gender' , 'status' , 'created']"
name="{{ __('Teacher.Add_Teacher') }}"
modeltitle="{{ __('app.delete_item') }}"
filters="false"
relation="specialization"
table="teacher"
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
