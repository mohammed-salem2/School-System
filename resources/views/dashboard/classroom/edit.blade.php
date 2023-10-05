@extends('layouts.master')

@section('title', 'Edit Grade')

@section('content')
 {{-- //هان في الفورم فش ميثود اسمها بوت ي اما جيت او بوست القيمة الافتراضية في حال وضعت قيمة غير الجيت و البوست هي الجيت --}}
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('classroom.edit_classroom') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('classrooms.update' , $classrooms->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form">
                <!--begin::Repeater-->
            <div>
                <!--begin::Form group-->
                <div class="form-group">
                    <div>
                        <div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-dashboard.input-form name="name" label="{{ __('classroom.name_ar') }}" :value="$classrooms->getTranslation('name', 'ar')" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-dashboard.input-form name="name_en" label="{{ __('classroom.name_en') }}" :value="$classrooms->getTranslation('name', 'en')" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <x-dashboard.select-form name="grade_id" label="{{ __('classroom.choose_grade') }}" firstChoose="{{ __('classroom.choose_grade') }}" :parents="$grades" :parent-id="$classrooms->grade_id" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Form group-->
            </div>
            <!--end::Repeater-->
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('app.update') }}</button>
                <a href="{{ route('admins.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
            </div>
        </form>
    </div>
@endsection

@section('JsFile')
{{-- <script src="{{ asset('cms/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

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
</script> --}}
@endsection
