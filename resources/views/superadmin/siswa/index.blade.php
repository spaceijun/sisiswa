@extends('layouts.app')

@section('template_title')
    Siswas
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
                                {{ __('Siswas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('superadmin.siswas.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Kelas</th>
                                        <th>Nama Siswa</th>
                                        <th>Nis</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telephone</th>
                                        <th>Image</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Penilaian</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($siswas as $siswa)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $siswa->kelas_id }}</td>
                                            <td>{{ $siswa->nama_siswa }}</td>
                                            <td>{{ $siswa->nis }}</td>
                                            <td>{{ $siswa->tempat_lahir }}</td>
                                            <td>{{ $siswa->tanggal_lahir }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td>{{ $siswa->agama }}</td>
                                            <td>{{ $siswa->jenis_kelamin }}</td>
                                            <td>{{ $siswa->telephone }}</td>
                                            <td><img src="{{ asset('storage/' . $siswa->image) }}" alt="Siswa Image"
                                                    sizes="width=100px; height=100px"></td>
                                            <td>{{ $siswa->nama_ayah }}</td>
                                            <td>{{ $siswa->nama_ibu }}</td>
                                            <td>{{ $siswa->tahun_ajaran }}</td>
                                            {{-- <td>{{ $siswa->penilaian }}</td> --}}

                                            <td>
                                                <form action="{{ route('superadmin.siswas.destroy', $siswa->id) }}"
                                                    method="POST">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#showModal{{ $siswa->id }}">
                                                        <i class="las la-eye"></i> {{ __('Show') }}
                                                    </button>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('superadmin.siswas.edit', $siswa->id) }}"><i
                                                            class="las la-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="las la-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('superadmin.siswa.partials.modal-siswa')
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
                        @include('layouts.pagination', ['paginator' => $siswas])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
