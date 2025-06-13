@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Guru
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">

                <div class="card card-animate">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Guru</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('superadmin.gurus.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('superadmin.guru.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
