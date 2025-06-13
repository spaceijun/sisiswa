<div class="row padding-1 p-1">
    <!-- Kolom Kiri -->
    <div class="form-group mb-2 mb20">
        <label for="penilaian" class="form-label">{{ __('Penilaian') }}</label>
        <input type="number" name="penilaian" class="form-control @error('penilaian') is-invalid @enderror"
            value="{{ old('penilaian', $siswa?->penilaian) }}" id="penilaian" placeholder="Penilaian">
        {!! $errors->first('penilaian', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
    </div>
</div>

<!-- Tombol Submit - Full Width -->
<div class="col-md-12 mt20 mt-2">
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</div>
</div>
