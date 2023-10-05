<div class="form">
    <!--begin::Stepper-->
    <div class="stepper stepper-pills" id="kt_stepper_example_basic">
        <!--begin::Nav-->
        <div class="stepper-nav flex-center flex-wrap mb-10">
            <!--begin::Step 1-->
            <div class="stepper-item mx-2 my-4 current" data-kt-stepper-element="nav">
                <!--begin::Line-->
                <div class="stepper-line w-40px"></div>
                <!--end::Line-->

                <!--begin::Icon-->
                <div class="stepper-icon w-40px h-40px">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">1</span>
                </div>
                <!--end::Icon-->

                <!--begin::Label-->
                <div class="stepper-label">
                    <h3 class="stepper-title">
                        {{ __('Parent_trans.step_one') }}
                    </h3>

                    <div class="stepper-desc">
                        {{ __('Parent_trans.Step1') }}
                    </div>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Step 1-->

            <!--begin::Step 2-->
            <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                <!--begin::Line-->
                <div class="stepper-line w-40px"></div>
                <!--end::Line-->

                <!--begin::Icon-->
                <div class="stepper-icon w-40px h-40px">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">2</span>
                </div>
                <!--begin::Icon-->

                <!--begin::Label-->
                <div class="stepper-label">
                    <h3 class="stepper-title">
                        {{ __('Parent_trans.step_two') }}
                    </h3>

                    <div class="stepper-desc">
                        {{ __('Parent_trans.Step2') }}
                    </div>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Step 2-->

            <!--begin::Step 3-->
            <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                <!--begin::Line-->
                <div class="stepper-line w-40px"></div>
                <!--end::Line-->

                <!--begin::Icon-->
                <div class="stepper-icon w-40px h-40px">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">3</span>
                </div>
                <!--begin::Icon-->

                <!--begin::Label-->
                <div class="stepper-label">
                    <h3 class="stepper-title">
                        {{ __('Parent_trans.step_three') }}
                    </h3>

                    <div class="stepper-desc">
                        {{ __('Parent_trans.Step3') }}
                    </div>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Step 3-->
        </div>
        <!--end::Nav-->

        <!--begin::Form-->
        <form class="form w-lg-500px mx-auto" novalidate="novalidate" id="kt_stepper_example_basic_form">
            <!--begin::Group-->
            <div class="mb-5">
                <!--begin::Step 1-->
                <div class="flex-column current" data-kt-stepper-element="content">
                    <!--begin::Input group-->
                    {{-- <div class="fv-row mb-10">
                        <div class="col">
                            <x-dashboard.input-form type="email" name="email" label="{{ __('Parent_trans.Email') }}"
                                :value="$parents->email" />
                        </div>
                        <div class="col">
                            <x-dashboard.input-form type="password" name="password"
                                label="{{ __('Parent_trans.Password') }}" :value="$parents->password" />
                        </div>
                    </div> --}}
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <div class="col">
                            <x-dashboard.input-form name="name_father" label="{{ __('Parent_trans.Name_Father') }}"
                                :value="$parents->getTranslation('name_father', 'ar')" />
                        </div>
                        <div class="col">
                            <x-dashboard.input-form name="name_father_en"
                                label="{{ __('Parent_trans.Name_Father_en') }}" :value="$parents->getTranslation('name_father', 'en')" />
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <div class="col">
                            <x-dashboard.input-form name="job_father" label="{{ __('Parent_trans.Job_Father') }}"
                                :value="$parents->getTranslation('job_father', 'ar')" />
                        </div>
                        <div class="col">
                            <x-dashboard.input-form name="job_father_en" label="{{ __('Parent_trans.Job_Father_en') }}"
                                :value="$parents->getTranslation('job_father', 'en')" />
                        </div>

                        <div class="col">
                            <x-dashboard.input-form name="national_id_father"
                                label="{{ __('Parent_trans.National_ID_Father') }}" :value="$parents->national_id_father" />
                        </div>
                        <div class="col">
                            <x-dashboard.input-form name="passport_id_father"
                                label="{{ __('Parent_trans.Passport_ID_Father') }}" :value="$parents->passport_id_father" />
                        </div>

                        <div class="col">
                            <x-dashboard.input-form name="phone_father" label="{{ __('Parent_trans.Phone_Father') }}"
                                :value="$parents->phone_father" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <div class="form-group col">
                            <label for="inputCity">{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                            <select class="form-select my-1 mr-sm-2" data-control="select2"
                                name="nationality_father_id">
                                <option value=" ">{{ trans('Parent_trans.Choose') }}...</option>
                                @foreach ($nationalities as $national)
                                    <option value="{{ $national->id }}"
                                        @if ($national->id == old('nationality_father_id', $parents->nationality_father_id)) selected @endif>{{ $national->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nationality_father_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <x-dashboard.select-form name="blood_father_id"
                                label="{{ __('Parent_trans.Blood_Type_Father_id') }}"
                                firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$bloods" :parent-id="$parents->blood_father_id" />
                        </div>
                        <div class="form-group col">
                            <x-dashboard.select-form name="religion_father_id"
                                label="{{ __('Parent_trans.Religion_Father_id') }}"
                                firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$religions" :parent-id="$parents->religion_father_id" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <x-dashboard.text-area-form name="address_father"
                            label="{{ __('Parent_trans.Address_Father') }}" :value="$parents->address_father" />
                    </div>
                    <!--end::Input group-->
                </div>
                <!--begin::Step 1-->

                <!--begin::Step 1-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <div class="col">
                            <x-dashboard.input-form name="name_mother" label="{{ __('Parent_trans.Name_Mother') }}"
                                :value="$parents->getTranslation('name_mother', 'ar')" />
                        </div>
                        <div class="col">
                            <x-dashboard.input-form name="name_mother_en"
                                label="{{ __('Parent_trans.Name_Mother_en') }}" :value="$parents->getTranslation('name_mother', 'en')" />
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <div class="col">
                            <x-dashboard.input-form name="job_mother" label="{{ __('Parent_trans.Job_Father') }}"
                                :value="$parents->getTranslation('job_mother', 'ar')" />
                        </div>
                        <div class="col">
                            <x-dashboard.input-form name="job_mother_en" label="{{ __('Parent_trans.Job_Father_en') }}"
                                :value="$parents->getTranslation('job_mother', 'en')" />
                        </div>

                        <div class="col">
                            <x-dashboard.input-form name="national_id_mother"
                                label="{{ __('Parent_trans.National_ID_Father') }}" :value="$parents->national_id_mother" />
                        </div>
                        <div class="col">
                            <x-dashboard.input-form name="passport_id_mother"
                                label="{{ __('Parent_trans.Passport_ID_Father') }}" :value="$parents->passport_id_mother" />
                        </div>

                        <div class="col">
                            <x-dashboard.input-form name="phone_mother" label="{{ __('Parent_trans.Phone_Father') }}"
                                :value="$parents->phone_mother" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <div class="form-group col">
                            <label for="inputCity">{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                            <select class="form-select my-1 mr-sm-2" data-control="select2"
                                name="nationality_mother_id">
                                <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                                @foreach ($nationalities as $national)
                                    <option value="{{ $national->id }}"
                                        @if ($national->id == old('nationality_mother_id', $parents->nationality_mother_id)) selected @endif>{{ $national->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nationality_mother_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <x-dashboard.select-form name="blood_mother_id"
                                label="{{ __('Parent_trans.Blood_Type_Father_id') }}"
                                firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$bloods" :parent-id="$parents->blood_mother_id" />
                        </div>
                        <div class="form-group col">
                            <x-dashboard.select-form name="religion_mother_id"
                                label="{{ __('Parent_trans.Religion_Father_id') }}"
                                firstChoose="{{ __('Parent_trans.Choose') }}" :parents="$religions" :parent-id="$parents->religion_mother_id" />
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <x-dashboard.text-area-form name="address_mother"
                            label="{{ __('Parent_trans.Address_Mother') }}" :value="$parents->address_mother" />
                    </div>
                    <!--end::Input group-->
                </div>
                <!--begin::Step 1-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <h1 class="text-center">
                        {{ __('Parent_trans.sure') }}
                    </h1>
                </div>
                <!--begin::Step 1-->
            </div>
            <!--end::Group-->

            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Wrapper-->
                <div class="me-2">
                    <button type="button" class="btn btn-light btn-active-light-primary"
                        data-kt-stepper-action="previous">
                        {{ __('Parent_trans.Back') }}
                    </button>
                </div>
                <!--end::Wrapper-->

                <!--begin::Wrapper-->
                <div>
                    <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit">
                        <span class="indicator-label">
                            {{ __('app.store') }}
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>

                    <button type="button" class="btn btn-primary mb-2" data-kt-stepper-action="next">
                        {{ __('Parent_trans.Next') }}
                    </button>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Stepper-->
</div>

{{-- <div class="form">
    <div class="form-group">
        <x-dashboard.input-form name="name" label="{{ __('grade.name_ar') }}" :value="$sections->getTranslation('name', 'ar')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="name_en" label="{{ __('grade.name_en') }}" :value="$sections->getTranslation('name', 'en')" />
    </div>
    <div class="form-group">
        <label for="grade_id">{{ __('classroom.choose_grade') }}</label>
            <select class="form-select col-12 @error('grade_id')
            is-invalid
        @enderror" id="'grade_id" name="grade_id" onchange="console.log($(this).val())" >
                <option value=" ">{{ __('classroom.choose_grade') }}</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id}}" @if ($grade->id == old('grade_id', $sections->grade_id)) selected @endif >
                        {{ $grade->name }}</option>
                @endforeach
            </select>
            @error('grade_id')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
    </div>
    <div class="form-group">
        <label for="classroom_id">{{ __('section.choose_classroom') }}</label>
        <select id="classroom_id" name="classroom_id" class="form-select">
            <option value=" ">
                {{ __('section.choose_classroom') }}
            </option>
        </select>
    </div>
    <div class="form-group">
        <x-dashboard.select-fix-form name="status" label="Choose Status" :status="$sections->status" />
    </div>
</div> --}}
<!-- /.card-body -->

{{-- <div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admins.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div> --}}
