@extends('layouts.cms')

@section('title', 'Trash Admins')

@section('CssFile')
@endsection

@section('content')
<x-dashboard.alert />
<x-dashboard.trash-table :ths="['#', 'Name', 'Email', 'Status', 'Actions']"
:models="$admins"
{{-- restoreall="admins.edit" --}}
index="admins.index"
trash="admins.trash"
name="Admin Table"
restore="admins.restore"
restoreall="admins.restore-all"
deleteforce="admins.force-delete"
:values="['id', 'name', 'email', 'status']"
modeltitle="Delete Item !!"
colbtn="6"
:filters="[
    [
        'name' => 'name',
        'placeholder' => 'Search By Name',

],
[
        'name' => 'email',
        'placeholder' => 'Search By Email',
],
]"
/>
@endsection

@section('JsFile')
@endsection
