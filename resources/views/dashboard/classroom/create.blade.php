@extends('layouts.master')

@section('title', 'Create Grade')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('classroom.create_new_class') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('classrooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('dashboard.classroom.__form' , [
                'button' => __('app.store'),
            ])
        </form>
    </div>
@endsection

@section('JsFile')
<script src="{{ asset('cms/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

<script>
    $('#kt_docs_repeater_basic').repeater({
    initEmpty: false,

    defaultValues: {
        'text-input': 'foo'
    },

    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});
</script>



@endsection
