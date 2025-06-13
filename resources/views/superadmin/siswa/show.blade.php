@extends('layouts.app')

@section('template_title')
    {{ $siswa->name ?? __('Show') . " " . __('Siswa') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-animate">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Siswa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('siswas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Kelas Id:</strong>
                                    {{ $siswa->kelas_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama Siswa:</strong>
                                    {{ $siswa->nama_siswa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nis:</strong>
                                    {{ $siswa->nis }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tempat Lahir:</strong>
                                    {{ $siswa->tempat_lahir }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tanggal Lahir:</strong>
                                    {{ $siswa->tanggal_lahir }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alamat:</strong>
                                    {{ $siswa->alamat }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Agama:</strong>
                                    {{ $siswa->agama }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jenis Kelamin:</strong>
                                    {{ $siswa->jenis_kelamin }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telephone:</strong>
                                    {{ $siswa->telephone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Image:</strong>
                                    {{ $siswa->image }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama Ayah:</strong>
                                    {{ $siswa->nama_ayah }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama Ibu:</strong>
                                    {{ $siswa->nama_ibu }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tahun Ajaran:</strong>
                                    {{ $siswa->tahun_ajaran }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Penilaian:</strong>
                                    {{ $siswa->penilaian }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
