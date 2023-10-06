@extends('layouts.master')

@section('title', 'Index Admins')

@section('CssFile')
<link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<x-dashboard.table title="Parents Table" :ths="['#', __('Parent_trans.name_fa') , __('Parent_trans.name_ma') ,  __('Parent_trans.Email') ,  __('section.created') ,  __('grade.Actions')]"
:models="$parents"
edit="parents.edit"
show="parents.show"
destory="parents.destroy"
index="parents.index"
create="parents.create"
:values="['id', 'name_father', 'name_mother' , 'email' , 'created']"
name="{{ __('Parent_trans.create_new_parents') }}"
filters='false'
modeltitle="{{ __('app.delete_item') }}"
:text_filters="[
    ['name' => 'name_father', 'label' => 'Filter by Father Name', 'cols' => '4'] ,
    ['name' => 'name_mother', 'label' => 'Filter by Mother Name', 'cols' => '4'] ,
]"
table="parent"
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
