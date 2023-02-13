<div class="modal fade" id="detailPasien-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Detail Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">No. Antrian</label>
                                <div>
                                    @if ($p->antrian->no_antrian == NULL)
                                    <span class="badge badge-soft-warning">No. Antrian belum ada</span>
                                    @if (Auth::user()->role == 'admin' or Auth::user()->role == 'apoteker')
                                        <a href="{{ route('datapasien.antrian', $p->antrian->pasien_id) }}" type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Ambil No. Antrian</a>
                                    @endif
                                    @else
                                    <span class="badge badge-soft-success">{{ $p->antrian->no_antrian }}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="firstName" class="form-label">NIK KTP</label>
                                <p>{{ $p->nik_ktp }}</p>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Nama Lengkap</label>
                                <p>{{ $p->nama_lengkap }}</p>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">No. Handphone</label>
                                <p>{{ $p->nohp }}</p>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Umur</label>
                                <p>{{ $p->umur }}</p>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Tempat dan Tanggal Lahir</label>
                                <p>{{ $p->tempat_lahir }}, {{ date('d M Y', strtotime($p->tanggal_lahir)) }}</p>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Alamat</label>
                                <p>{{ $p->alamat }}</p>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Jenis Kelamin</label>
                                <p>{{ $p->jenis_kelamin }}</p>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Poli</label>
                                <p>{{ $p->poli }}</p>
                            </div>
                        </div>
                    </div><!--end row-->
            </div>
        </div>
    </div>
</div>
