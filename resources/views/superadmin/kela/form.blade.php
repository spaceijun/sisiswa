<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nama_kelas" class="form-label">{{ __('Nama Kelas') }}</label>
            <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror"
                value="{{ old('nama_kelas', $kela?->nama_kelas) }}" id="nama_kelas" placeholder="Nama Kelas">
            {!! $errors->first('nama_kelas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="kelas_category_id" class="form-label">{{ __('Jurusan') }}</label>
            <select name="kelas_category_id" class="form-control @error('kelas_category_id') is-invalid @enderror"
                id="kelas_category_id">
                <option value="">-- Select Jurusan --</option>
                @foreach ($kelasCategories as $kelasCategory)
                    <option value="{{ $kelasCategory->id }}"
                        {{ old('kelas_category_id', $kela?->kelas_category_id) == $kelasCategory->id ? 'selected' : '' }}>
                        {{ $kelasCategory->nama_kategori }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first(
                'kelas_category_id',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jumlah_siswa" class="form-label">{{ __('Jumlah Siswa') }}</label>
            <input type="text" name="jumlah_siswa" class="form-control @error('jumlah_siswa') is-invalid @enderror"
                value="{{ old('jumlah_siswa', $kela?->jumlah_siswa) }}" id="jumlah_siswa" placeholder="Jumlah Siswa">
            {!! $errors->first('jumlah_siswa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="guru_id" class="form-label">{{ __('Wali Kelas') }}</label>
            <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror" id="guru_id">
                <option value="">-- Select Wali Kelas --</option>
                @foreach ($guru as $guruItem)
                    <option value="{{ $guruItem->id }}"
                        {{ old('guru_id', $kela?->guru_id) == $guruItem->id ? 'selected' : '' }}>
                        {{ $guruItem->nama_guru }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('guru_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
