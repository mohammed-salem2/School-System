<div class="form">
    <div class="form-group">
        <x-dashboard.input-form name="name" label="Name" :value="$admins->name" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form type="email" name="email" label="Email" :value="$admins->email" />
    </div>
    <div class="form-group">
        <x-dashboard.input-form type="password" name="password" label="Password" />
    </div>
    <div class="form-group">
        <x-dashboard.select-fix-form name="status" label="Choose Status" :status="$admins->status" />
    </div>
    <div class="form-group">
            <label for="role">Choose Role</label>
            <select name="role" id="role" class="form-select @error('role')
            is-invalid
        @enderror">
        <option value="1" @if (old('role' , $admins->role) == '1') selected @endif>Super Admin</option>
        <option value="0" @if (old('role' , $admins->role) == '0') selected @endif>Admin</option>
    </select>
    @error('role')
            <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="form-group">
        <x-dashboard.input-form type="file" name="image" label="Choose Image" :value="$admins->image" />
            {{-- @if ($admins->image != null)
                <img src="{{ $admins->image_url }}" alt="" class="w-50 mt-3">
            @else
            <img src="{{ $admins->image_url }}" alt="" class="w-50 mt-3">
            @endif --}}
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admins.index') }}" class="btn btn-secondary">Back</a>
</div>
