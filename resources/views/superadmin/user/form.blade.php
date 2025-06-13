<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user?->name) }}" id="name" placeholder="{{ __('Name') }}" required>
            @error('name')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user?->email) }}" id="email" placeholder="{{ __('Email') }}" required>
            @error('email')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="form-group mb-2 mb20">
            <label for="telephone" class="form-label">{{ __('Telephone') }}</label>
            <input type="tel" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                value="{{ old('telephone', $user?->telephone) }}" id="telephone" placeholder="{{ __('Telephone') }}"
                pattern="[0-9]{11,15}" title="Telephone must be between 11-15 digits">
            @error('telephone')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
            <small class="text-muted">{{ __('Minimal 11 digit Maximal 15 digit') }}</small>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                id="password" placeholder="{{ __('Masukkan password baru') }}" {{ !isset($user) ? 'required' : '' }}>
            <small class="form-text text-muted">{{ __('Kosongkan jika tidak ingin mengubah password') }}</small>
            @error('password')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="form-group mb-2 mb20">
            <label for="role" class="form-label">{{ __('Role') }}</label>
            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                <option value="">{{ __('-- Select Role --') }}</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}"
                        {{ old('role', $user?->role ?? $user?->getRoleNames()->first()) == $role->name ? 'selected' : '' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
            @error('role')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
