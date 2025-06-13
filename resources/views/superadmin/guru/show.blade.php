@extends('layouts.app')

@section('template_title')
    {{ $guru->name ?? __('Show') . " " . __('Guru') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-animate">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Guru</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('gurus.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nip:</strong>
                                    {{ $guru->nip }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama Guru:</strong>
                                    {{ $guru->nama_guru }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Kelas Id:</strong>
                                    {{ $guru->kelas_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alamat:</strong>
                                    {{ $guru->alamat }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status:</strong>
                                    {{ $guru->status }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telephone:</strong>
                                    {{ $guru->telephone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jabatan:</strong>
                                    {{ $guru->jabatan }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
