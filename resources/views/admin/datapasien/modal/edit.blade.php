<div class="modal fade" id="editPasien-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('datapasien.update', $p->id) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">NIK KTP</label>
                                <input type="text" class="form-control" name="nik_ktp" value="{{ $p->nik_ktp }}" readonly>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" value="{{ $p->nama_lengkap }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">No. Handphone</label>
                                <input type="text" class="form-control" name="nohp" value="{{ $p->nohp }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Umur</label>
                                <input type="number" class="form-control" name="umur" value="{{ $p->umur }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="{{ $p->tempat_lahir }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir"  data-provider="flatpickr" data-date-format="Y-m-d" required>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $p->alamat }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="genderInput" class="form-label">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" selected type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-laki">
                                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <label for="genderInput" class="form-label">Poli</label>
                            <select class="form-select rounded-pill mb-3" aria-label="Default select example" name="poli" required>
                                <option selected value="">Pilih poli</option>
                                <option value="Poliklinik Penyakit Dalam">Poliklinik Penyakit Dalam</option>
                                <option value="Poliklinik Bedah">Poliklinik Bedah</option>
                                <option value="Poliklinik Kebidanan & Kandungan">Poliklinik Kebidanan & Kandungan</option>
                                <option value="Poliklinik Anak">Poliklinik Anak</option>
                                <option value="Poliklinik Beda Saraf">Poliklinik Beda Saraf</option>
                                <option value="Poliklinik Gigi & Mulut">Poliklinik Gigi & Mulut</option>
                                <option value="Poliklinik THT">Poliklinik THT</option>
                                <option value="Poliklinik Umum">Poliklinik Umum</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
