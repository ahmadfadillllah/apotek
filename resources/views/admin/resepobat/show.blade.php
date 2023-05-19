@include('admin.layout.head')
@include('admin.layout.header')
@include('admin.layout.sidebar')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Resep Obat</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Resep Obat</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            @include('admin.notification.index')
            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="disabledInput" class="form-label">Durasi Waktu</label>
                                        <h2 class="text-info">{{ $time->h }}:{{ $time->i }}:{{ $time->s }}</h2>
                                    </div>
                                </div>
                                @if (Auth::user()->role != 'dokter')
                                <div class="col-xxl-12 col-md-6">
                                    <div>
                                        <button type="button" type="submit" class="btn btn-warning btn-animation waves-effect waves-light"
                                        data-text="Akhiri Pasien" data-bs-toggle="modal" data-bs-target="#destroyPasien-{{ $pasien->id }}"><span>Akhiri Pasien</span></button>
                                        @include('admin.resepobat.end')
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end page title -->
            <div class="row mt-2">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="disabledInput" class="form-label">NIK</label>
                                        <input type="text" class="form-control" value="{{ $pasien->nik_ktp }}" disabled>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="disabledInput" class="form-label">Nama</label>
                                        <input type="text" class="form-control" value="{{ $pasien->nama_lengkap }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    @if(Auth::user()->role == 'admin' or Auth::user()->role == 'dokter')
                    <form action="{{ route('resepobat.keluhan', $pasien->keluhan->pasien_id) }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Masukkan Keluhan</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="exampleFormControlTextarea5" class="form-label">Keluhan</label>
                                        <textarea class="form-control" rows="3"
                                            name="keluhan">@if ($pasien->keluhan->keluhan == NULL)@else{{ $pasien->keluhan->keluhan }}@endif</textarea>
                                    </div>
                                </div>
                            </div><!-- end card-body -->
                        </div>
                        <button type="submit" class="btn btn-primary btn-animation waves-effect waves-light"
                            data-text="Kirim"><span>Submit Keluhan</span></button>
                    </form>
                    <br><br>
                    @else
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Keluhan</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <textarea class="form-control" rows="3"
                                        name="keluhan" readonly>@if ($pasien->keluhan->keluhan == NULL)@else{{ $pasien->keluhan->keluhan }}@endif</textarea>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            @if (Auth::user()->role == 'admin' or Auth::user()->role == 'dokter')
                                <button type="button" class="btn btn-outline-secondary custom-toggle" data-bs-toggle="modal" data-bs-target="#tambahResep" style="float: right">
                                    <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Tambah</span>                                        </button>
                                <h4 class="card-title mb-0">Masukkan Resep Obat</h4>
                                @include('admin.resepobat.insert')
                            @endif
                        </div><!-- end card header -->
                        <div class="card-body">
                            <table class="table table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Obat</th>
                                        <th scope="col">Pemakaian</th>
                                        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'dokter')
                                            <th scope="col">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($obat))
                                        @foreach ($obat as $o)
                                            <tr>
                                                <th scope="row"><a href="#" class="fw-semibold">{{ $loop->iteration }}</a></th>
                                                <td>{{ $o->kode }}</td>
                                                <td>{{ $o->nama_obat }}</td>
                                                <td>{{ $o->pemakaian }}</td>
                                                @if (Auth::user()->role == 'admin' or Auth::user()->role == 'dokter')
                                                    <td>
                                                        <a href="{{ route('resepobat.destroy', $o->id) }}" class="link-warning">Hapus<i
                                                                class="ri-arrow-right-line align-middle"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div><!-- end card-body -->
                    </div>
                    <!-- Animation Buttons -->
                    <a href="{{ route('resepobat.index') }}" type="submit" class="btn btn-secondary btn-animation waves-effect waves-light"
                        data-text="Kembali"><span>Kembali</span></a>

                        <br><br>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@include('admin.layout.customizer')
@include('admin.layout.footer')
