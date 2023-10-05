@extends('layouts.master')

@section('title', 'Create Parent')

@section('CssFile')
@livewireStyles
@endsection

@section('content')
@livewire('add-parent')
@endsection

@section('JsFile')
@livewireScripts
@endsection
