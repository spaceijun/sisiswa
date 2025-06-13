@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Jurusan Kelas
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-animate">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Jurusan Kelas</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('superadmin.kelas-categories.update', $kelasCategory->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('superadmin.kelas-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
