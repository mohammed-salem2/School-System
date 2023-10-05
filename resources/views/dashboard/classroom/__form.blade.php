<div class="form">
    <!--begin::Repeater-->
<div id="kt_docs_repeater_basic">
    <!--begin::Form group-->
    <div class="form-group">
        <div data-repeater-list="kt_docs_repeater_basic">
            <div data-repeater-item>
                <div class="form-group row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <x-dashboard.input-form name="name" label="{{ __('classroom.name_ar') }}" :value="$classrooms->getTranslation('name', 'ar')" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <x-dashboard.input-form name="name_en" label="{{ __('classroom.name_en') }}" :value="$classrooms->getTranslation('name', 'en')" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <x-dashboard.select-form name="grade_id" label="{{ __('classroom.choose_grade') }}" firstChoose="{{ __('classroom.choose_grade') }}" :parents="$grades" :parent-id="$classrooms->grade_id" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                            <i class="la la-trash-o"></i>Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Form group-->

    <!--begin::Form group-->
    <div class="form-group mt-5">
        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
            <i class="la la-plus"></i>Add
        </a>
    </div>
    <!--end::Form group-->
</div>
<!--end::Repeater-->
    {{-- <div class="form-group">
        <x-dashboard.input-form name="name" label="{{ __('classroom.name_ar') }}" :value="$classrooms->getTranslation('name', 'ar')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="name_en" label="{{ __('grade.name_en') }}" :value="$classrooms->getTranslation('name', 'en')" />
    </div>
    <div class="form-group">
        <x-dashboard.text-area-form name="note" label="{{ __('grade.note') }}" :value="$classrooms->note" />
    </div> --}}
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admins.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
