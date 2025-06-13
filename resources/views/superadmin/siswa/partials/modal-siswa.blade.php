<div id="showModal{{ $siswa->id }}" class="modal flip" tabindex="-1" aria-labelledby="showModalLabel{{ $siswa->id }}"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $siswa->id }}">
                    Detail Siswa
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Nama siswa</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->nama_siswa }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Kelas</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->kela->nama_kelas }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>NIS</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->nis }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Tempat & Tanggal Lahir</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Alamat</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->alamat }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Agama</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->agama }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Jenis Kelamin</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->jenis_kelamin }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Telephone</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->telephone }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Image</strong>
                    </div>
                    <div class="col-sm-8">
                        <img src="{{ asset('storage/' . $siswa->image) }}" alt="Siswa Image"
                            sizes="width=100px; height=100px">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Nama Ayah</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->nama_ayah }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Nama Ibu</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->nama_ibu }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Tahun Ajaran</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->tahun_ajaran }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Create</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->created_at->format('d-m-Y') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Update</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $siswa->updated_at->format('d-m-Y') }}
                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
