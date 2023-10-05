<div class="form">
    <div class="form-group">
        <x-dashboard.input-form name="name" label="{{ __('Teacher.Name_ar') }}" :value="$teachers->getTranslation('name', 'ar')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="name_en" label="{{ __('Teacher.Name_en') }}" :value="$teachers->getTranslation('name', 'en')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form type="email" name="email" label="{{ __('Teacher.Email') }}" :value="$teachers->email" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form type="password" name="password" label="{{ __('Teacher.Password') }}" />
    </div>
    <div class="form-group">
        <x-dashboard.select-form name="specialization_id" label="{{ __('Teacher.specialization') }}" firstChoose="{{ __('Teacher.choose_specialization') }}" :parents="$specializations" :parent-id="$teachers->specialization_id" />
    </div>
    <div class="form-group">
        <x-dashboard.select-fix-form name="status" label="{{ __('Teacher.Status') }}" :status="$teachers->status" />
    </div>
    <div class="form-group">
        <label for="gender">{{ __('Teacher.Gender') }}</label>
        <select class="form-select @error('gender')
        is-invalid
    @enderror" id="gender" name="gender">
            <option value="male" @if (old('gender' , $teachers->gender) == 'male') selected @endif>Male</option>
            <option value="female" @if (old('gender' , $teachers->gender) == 'female') selected @endif>Female</option>
        </select>
        @error('gender')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <x-dashboard.input-form type="date" name="joining_date" label="{{ __('Teacher.Joining_Date') }}" :value="$teachers->joining_date" />
    </div>
    <div class="form-group">
        <x-dashboard.text-area-form name="address" label="{{ __('Teacher.Address') }}" :value="$teachers->address" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form type="file" name="image" label="{{ __('Teacher.Image') }}" :value="$teachers->joining_date" />
    </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer mt-2">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
