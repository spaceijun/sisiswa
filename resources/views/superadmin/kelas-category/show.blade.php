@extends('layouts.app')

@section('template_title')
    {{ $kelasCategory->name ?? __('Show') . " " . __('Kelas Category') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-animate">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Kelas Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('kelas-categories.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama Kategori:</strong>
                                    {{ $kelasCategory->nama_kategori }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
