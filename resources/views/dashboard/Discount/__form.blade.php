<div class="form">
    <div class="form-group">
        <x-dashboard.input-form name="name" label="{{ __('grade.name_ar') }}" :value="$discounts->getTranslation('name', 'ar')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form name="name_en" label="{{ __('grade.name_en') }}" :value="$discounts->getTranslation('name', 'en')" />
    </div>
    <div class="form-group">
        <x-dashboard.input-number name="discount" min="0" label="{{ __('sidebar.discount') }}" :value="$discounts->discount" />
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('discounts.index') }}" class="btn btn-secondary">{{ __('app.back') }}</a>
</div>
