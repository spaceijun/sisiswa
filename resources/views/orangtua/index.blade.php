@extends('layouts.app')
@section('template_title')
    Data Nilai Siswa
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
                                {{ __('Data Nilai Siswa') }}
                            </span>
                            <div class="float-right">
                                {{-- <a href="{{ route('siswa.print') }}?autoprint=true" class="btn btn-success btn-sm"
                                    data-placement="left" onclick="return openPrintWindow(this.href)">
                                    <i class="las la-print"></i> {{ __('Print') }}
                                </a> --}}
                                {{-- <a href="{{ route('superadmin.siswas.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a> --}}
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
                                        <th>Jenis Kelamin</th>
                                        <th>Telephone</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Penilaian</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($siswas as $siswa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $siswa->kela->nama_kelas }}</td>
                                            <td>{{ $siswa->nama_siswa }}</td>
                                            <td>{{ $siswa->nis }}</td>
                                            <td>{{ $siswa->jenis_kelamin }}</td>
                                            <td>{{ $siswa->telephone }}</td>
                                            <td>{{ $siswa->tahun_ajaran }}</td>
                                            <td>{{ $siswa->penilaian }}</td>
                                        </tr>
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
