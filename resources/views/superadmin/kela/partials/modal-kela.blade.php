<div id="showModal{{ $kela->id }}" class="modal flip" tabindex="-1" aria-labelledby="showModalLabel{{ $kela->id }}"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $kela->id }}">
                    Detail Kelas
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Nama Kelas</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kela->nama_kelas }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Jurusan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kela->kelasCategory->nama_kategori }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Jumlah Siswa</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kela->jumlah_siswa }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Wali Kelas</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kela->guru->nama_guru ?? 'Tidak ada' }}
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Create</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kela->created_at->format('d-m-Y') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Update</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kela->updated_at->format('d-m-Y') }}
                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
