<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('Akun Guru') }}</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                <option value="">-- Select Akun Guru --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('user_id', $user?->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-2 mb20">
            <label for="nip" class="form-label">{{ __('Nip') }}</label>
            <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror"
                value="{{ old('nip', $guru?->nip) }}" id="nip" placeholder="Nip">
            {!! $errors->first('nip', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nama_guru" class="form-label">{{ __('Nama Guru') }}</label>
            <input type="text" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror"
                value="{{ old('nama_guru', $guru?->nama_guru) }}" id="nama_guru" placeholder="Nama Guru">
            {!! $errors->first('nama_guru', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="kelas_id" class="form-label">{{ __('Kelas') }}</label>
            <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id">
                <option value="">-- Select Kelas --</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}"
                        {{ old('kelas_id', $guru?->kelas_id) == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('kelas_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat">{{ old('alamat', $guru?->alamat) }}</textarea>
            {!! $errors->first('alamat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">{{ __('Status') }}</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror"
                value="{{ old('status', $guru?->status) }}" id="" placeholder="Status">
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telephone" class="form-label">{{ __('Telephone') }}</label>
            <input type="number" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                value="{{ old('telephone', $guru?->telephone) }}" id="telephone" placeholder="Telephone">
            {!! $errors->first('telephone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jabatan" class="form-label">{{ __('Jabatan') }}</label>
            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                value="{{ old('jabatan', $guru?->jabatan) }}" id="jabatan" placeholder="Jabatan">
            {!! $errors->first('jabatan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
