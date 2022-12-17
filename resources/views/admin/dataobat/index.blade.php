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
                        <h4 class="mb-sm-0">Data Obat</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Data Obat</li>
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
                                    <div class="card-header">
                                        <button type="button" class="btn btn-outline-secondary custom-toggle" data-bs-toggle="modal" data-bs-target="#tambahObat" style="float: right">
                                            <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> Tambah</span>                                        </button>
                                        <h5 class="card-title mb-0">Data Obat</h5>
                                    </div>
                                    @include('admin.dataobat.modal.tambah')
                                    <div class="card-body">
                                        <table id="itemset1" class="display table table-bordered dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode</th>
                                                    <th>Nama Obat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($obat as $o)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $o->kode }}</td>
                                                        <td>{{ $o->nama_obat }}</td>
                                                        <td>
                                                        <button type="button" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-24-hours-fill" data-bs-toggle="modal" data-bs-target="#editObat-{{ $o->id }}"></i></button>
                                                        @include('admin.dataobat.modal.edit')
                                                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line" data-bs-toggle="modal" data-bs-target="#destroyObat-{{ $o->id }}"></i></button></td>
                                                        @include('admin.dataobat.modal.destroy')
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
