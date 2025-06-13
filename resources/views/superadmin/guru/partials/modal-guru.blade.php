<div id="showModal{{ $guru->id }}" class="modal flip" tabindex="-1" aria-labelledby="showModalLabel{{ $guru->id }}"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $guru->id }}">
                    Detail Guru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>NIP</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->nip }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Nama Guru</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->nama_guru }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Kelas</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->kela->nama_kelas }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Alamat</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->alamat }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Status</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->status }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Telephone</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->telephone }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Jabatan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->jabatan }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Create</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->created_at->format('d-m-Y') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Update</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $guru->updated_at->format('d-m-Y') }}
                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
