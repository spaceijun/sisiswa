<div class="row padding-1 p-1">
    <!-- Kolom Kiri -->
    <div class="col-md-6">
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('Akun Siswa') }}</label>
            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                <option value="">-- Select Siswa --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                        {{ old('user_id', $siswa?->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="kelas_id" class="form-label">{{ __('Kelas') }}</label>
            <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id">
                <option value="">-- Select Kelas --</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}"
                        {{ old('kelas_id', $siswa?->kelas_id) == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('kelas_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nama_siswa" class="form-label">{{ __('Nama Siswa') }}</label>
            <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror"
                value="{{ old('nama_siswa', $siswa?->nama_siswa) }}" id="nama_siswa" placeholder="Nama Siswa">
            {!! $errors->first('nama_siswa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nis" class="form-label">{{ __('Nis') }}</label>
            <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror"
                value="{{ old('nis', $siswa?->nis) }}" id="nis" placeholder="Nis">
            {!! $errors->first('nis', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tempat_lahir" class="form-label">{{ __('Tempat Lahir') }}</label>
            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror"
                value="{{ old('tempat_lahir', $siswa?->tempat_lahir) }}" id="tempat_lahir" placeholder="Tempat Lahir">
            {!! $errors->first('tempat_lahir', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tanggal_lahir" class="form-label">{{ __('Tanggal Lahir') }}</label>
            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                value="{{ old('tanggal_lahir', $siswa?->tanggal_lahir) }}" id="tanggal_lahir"
                placeholder="Tanggal Lahir">
            {!! $errors->first(
                'tanggal_lahir',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat">{{ old('alamat', $siswa?->alamat) }}</textarea>
            {!! $errors->first('alamat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="agama" class="form-label">{{ __('Agama') }}</label>
            <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror"
                value="{{ old('agama', $siswa?->agama) }}" id="agama" placeholder="Agama">
            {!! $errors->first('agama', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <!-- Kolom Kanan -->
    <div class="col-md-6">
        <div class="form-group mb-2 mb20">
            <label for="jenis_kelamin" class="form-label">{{ __('Jenis Kelamin') }}</label>
            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                id="jenis_kelamin">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki"
                    {{ old('jenis_kelamin', $siswa?->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                </option>
                <option value="Perempuan"
                    {{ old('jenis_kelamin', $siswa?->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                </option>
            </select>
            {!! $errors->first(
                'jenis_kelamin',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="telephone" class="form-label">{{ __('Telephone') }}</label>
            <input type="number" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                value="{{ old('telephone', $siswa?->telephone) }}" id="telephone" placeholder="Telephone">
            {!! $errors->first('telephone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Image') }}</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                id="image" placeholder="Image">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            @if ($siswa?->image)
                <div class="mt-2">
                    <small class="text-muted">File saat ini: {{ $siswa->image }}</small>
                </div>
            @endif
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nama_ayah" class="form-label">{{ __('Nama Ayah') }}</label>
            <input type="text" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror"
                value="{{ old('nama_ayah', $siswa?->nama_ayah) }}" id="nama_ayah" placeholder="Nama Ayah">
            {!! $errors->first('nama_ayah', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nama_ibu" class="form-label">{{ __('Nama Ibu') }}</label>
            <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror"
                value="{{ old('nama_ibu', $siswa?->nama_ibu) }}" id="nama_ibu" placeholder="Nama Ibu">
            {!! $errors->first('nama_ibu', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tahun_ajaran" class="form-label">{{ __('Tahun Ajaran') }}</label>
            <input type="text" name="tahun_ajaran"
                class="form-control @error('tahun_ajaran') is-invalid @enderror"
                value="{{ old('tahun_ajaran', $siswa?->tahun_ajaran) }}" id="tahun_ajaran"
                placeholder="Tahun Ajaran">
            {!! $errors->first('tahun_ajaran', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="form-group mb-2 mb20">
        <label for="orangtua_id" class="form-label">{{ __('Notifikasi Orang Tua') }}</label>
        <select name="orangtua_id" class="form-control @error('orangtua_id') is-invalid @enderror" id="orangtua_id">
            <option value="">-- Select Orangtua --</option>
            @foreach ($orangtuas as $orangtua)
                <option value="{{ $orangtua->id }}"
                    {{ old('orangtua_id', $siswa?->orangtua_id) == $orangtua->id ? 'selected' : '' }}>
                    {{ $orangtua->name }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('orangtua_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>


    <!-- Tombol Submit - Full Width -->
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
