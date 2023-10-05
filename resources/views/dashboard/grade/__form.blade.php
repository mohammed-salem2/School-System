<div class="form">
    <div class="form-group">
        <x-dashboard.input-form name="name" label="{{ __('grade.name_ar') }}" :value="$grades->getTranslation('name', 'ar')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="name_en" label="{{ __('grade.name_en') }}" :value="$grades->getTranslation('name', 'en')" />
    </div>
    <div class="form-group">
        <x-dashboard.text-area-form name="note" label="{{ __('grade.note') }}" :value="$grades->note" />
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admins.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
