@extends('layouts.app')

@section('template_title')
    {{ $kela->name ?? __('Show') . " " . __('Kela') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-animate">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Kela</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('kelas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama Kelas:</strong>
                                    {{ $kela->nama_kelas }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Kelas Category Id:</strong>
                                    {{ $kela->kelas_category_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jumlah Siswa:</strong>
                                    {{ $kela->jumlah_siswa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Guru Id:</strong>
                                    {{ $kela->guru_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
