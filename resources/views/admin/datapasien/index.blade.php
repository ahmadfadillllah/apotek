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
                        <h4 class="mb-sm-0">Data Pasien</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Data Pasien</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            @include('admin.notification.index')
            <div class="row">
                <div class="col">
                    <div class="h-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    @if (Auth::user()->role == 'admin' or Auth::user()->role == 'perawat')
                                        <div class="card-header">
                                            <button type="button" class="btn btn-outline-secondary custom-toggle" data-bs-toggle="modal" data-bs-target="#tambahPasien" style="float: right">
                                                <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Tambah</span>                                        </button>
                                            <h5 class="card-title mb-0">Pasien</h5>
                                        </div>
                                        @include('admin.datapasien.modal.tambah')
                                    @endif
                                    <div class="card-body">
                                        <table id="itemset1" class="display table table-bordered dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Tempat Tanggal Lahir</th>
                                                    <th>Detail</th>
                                                    @if (Auth::user()->role == 'admin' or Auth::user()->role == 'perawat')
                                                        <th>Edit</th>
                                                        <th>Hapus</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pasien as $p)
                                                    <tr>
                                                        <td>{{ $p->nik_ktp }}</td>
                                                        <td>{{ $p->nama_lengkap }}</td>
                                                        <td>{{ $p->tempat_lahir }}, {{ date('d M Y', strtotime($p->tanggal_lahir)) }}</td>
                                                        <td><button type="button" class="btn btn-success btn-icon waves-effect waves-light"><i class="ri-check-double-line" data-bs-toggle="modal" data-bs-target="#detailPasien-{{ $p->id }}"></i></button></td>
                                                        @include('admin.datapasien.modal.detail')
                                                        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'perawat')
                                                            <td><button type="button" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-24-hours-fill" data-bs-toggle="modal" data-bs-target="#editPasien-{{ $p->id }}"></i></button></td>
                                                            @include('admin.datapasien.modal.edit')
                                                            <td><button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line" data-bs-toggle="modal" data-bs-target="#destroyPasien-{{ $p->id }}"></i></button></td>
                                                            @include('admin.datapasien.modal.destroy')
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@include('admin.layout.customizer')
@include('admin.layout.footer')
