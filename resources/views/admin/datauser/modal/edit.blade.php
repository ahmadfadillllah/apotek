<div class="modal fade" id="editUser-{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('datauser.update', $u->id) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" value="{{ $u->name }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Role</label>
                                <select class="form-select" name="role">
                                    <option {{ $u->role == $u->role ? "$u->role" : ""}} value="{{ $u->role }}">{{ $u->role }}
                                    <option value="dokter">dokter</option>
                                    <option value="perawat">perawat</option>
                                    <option value="apoteker">apoteker</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Poli</label>
                                <select class="form-select" name="poli">
                                    <option {{ $u->poli == $u->poli ? "$u->poli" : ""}} value="{{ $u->poli }}">{{ $u->poli }}
                                    <option value="Poliklinik Penyakit Dalam">Poliklinik Penyakit Dalam</option>
                                    <option value="Poliklinik Bedah">Poliklinik Bedah</option>
                                    <option value="Poliklinik Kebidanan & Kandungan">Poliklinik Kebidanan & Kandungan</option>
                                    <option value="Poliklinik Anak">Poliklinik Anak</option>
                                    <option value="Poliklinik Bedah Saraf">Poliklinik Bedah Saraf</option>
                                    <option value="Poliklinik Gigi & Mulut">Poliklinik Gigi & Mulut</option>
                                    <option value="Poliklinik THT">Poliklinik THT</option>
                                    <option value="Poliklinik Umum">Poliklinik Umum</option>
                                </select>
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
