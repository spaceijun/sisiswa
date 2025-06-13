@extends('layouts.app')

@section('template_title')
    Gurus
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @include('layouts.messages')
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Gurus') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('superadmin.gurus.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nip</th>
                                        <th>Nama Guru</th>
                                        <th>Kelas</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Telephone</th>
                                        <th>Jabatan</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gurus as $guru)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $guru->nip }}</td>
                                            <td>{{ $guru->nama_guru }}</td>
                                            <td>{{ $guru->kela->nama_kelas }}</td>
                                            <td>{{ $guru->alamat }}</td>
                                            <td>{{ $guru->status }}</td>
                                            <td>{{ $guru->telephone }}</td>
                                            <td>{{ $guru->jabatan }}</td>

                                            <td>
                                                <form action="{{ route('superadmin.gurus.destroy', $guru->id) }}"
                                                    method="POST">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#showModal{{ $guru->id }}">
                                                        <i class="las la-eye"></i> {{ __('Show') }}
                                                    </button>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('superadmin.gurus.edit', $guru->id) }}"><i
                                                            class="las la-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="las la-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('superadmin.guru.partials.modal-guru')
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="las la-inbox la-3x mb-2"></i>
                                                    <p class="mb-0">{{ __('No data available') }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @include('layouts.pagination', ['paginator' => $gurus])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
