@extends('layouts.master')

@section('title', 'Index Fees')

@section('CssFile')
<link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<x-dashboard.table title="Fees Table" :ths="['#', __('Fee.Title') , __('Fee.amount') , __('Fee.grade_name') ,  __('section.classroom_name') , __('Fee.year') , __('Fee.desc')  , __('section.created') ,  __('grade.Actions')]"
:models="$fees"
edit="fees.edit"
show="fees.show"
destory="fees.destroy"
index="fees.index"
create="fees.create"
:values="['id', 'title', 'amount' , 'forign_id' , 'forign_id_two'  , 'year' , 'description' ,'created']"
name="{{ __('Fee.create_new_fees') }}"
modeltitle="{{ __('app.delete_item') }}"
relation="grade"
filters="false"
relationtwo="classroom"
table="fee"
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
