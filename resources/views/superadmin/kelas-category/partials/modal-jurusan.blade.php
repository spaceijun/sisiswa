<div id="showModal{{ $kelasCategory->id }}" class="modal flip" tabindex="-1"
    aria-labelledby="showModalLabel{{ $kelasCategory->id }}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $kelasCategory->id }}">
                    Detail Jurusan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Jurusan</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kelasCategory->nama_kategori }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Create</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kelasCategory->created_at->format('d-m-Y') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <strong>Update</strong>
                    </div>
                    <div class="col-sm-8">
                        {{ $kelasCategory->updated_at->format('d-m-Y') }}
                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
