<div class="modal fade" id="editObat-{{ $o->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataobat.update', $o->id) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">Kode</label>
                                <input type="number" class="form-control" name="kode" value="{{ $o->kode }}" readonly>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Nama Obat</label>
                                <input type="text" class="form-control" name="nama_obat" value="{{ $o->nama_obat }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
