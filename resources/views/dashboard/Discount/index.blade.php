@extends('layouts.master')

@section('title', 'Index Fees')

@section('CssFile')
<link href="{{ asset('cms/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<x-dashboard.alert />
<x-dashboard.table :ths="['#', __('Fee.Title') , __('sidebar.discount')  , __('section.created') ,  __('grade.Actions')]"
:models="$discounts"
edit="discounts.edit"
show="discounts.show"
destory="discounts.destroy"
index="discounts.index"
create="discounts.create"
:values="['id', 'name', 'discount' ,'created']"
name="{{ __('Fee.create_new_dis') }}"
modeltitle="{{ __('app.delete_item') }}"
table="discount"
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
