<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nama_kategori" class="form-label">{{ __('Nama Jurusan') }}</label>
            <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror"
                value="{{ old('nama_kategori', $kelasCategory?->nama_kategori) }}" id="nama_kategori"
                placeholder="Nama Jurusan">
            {!! $errors->first(
                'nama_kategori',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
