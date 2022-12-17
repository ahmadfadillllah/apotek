@include('pasien.layout.head')
@include('pasien.layout.header')
@include('pasien.layout.sidebar')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col">
                    @include('admin.notification.index')
                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">{{ $salam }}</h4>
                                        <p class="text-muted mb-0">Semoga harimu menyenangkan.</p>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

            <form action="{{ route('dashboardpasien.cari') }}" method="GET">
                @csrf
                <div class="card-body">
                    <div class="row gy-12">
                        <div class="col-xxl-12 col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nik_ktp"
                                    placeholder="Masukkan NIK" required>
                                <label for="firstnamefloatingInput">Masukkan NIK</label>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <br>
                    <button type="submit" class="btn rounded-pill btn-primary waves-effect waves-light">Cari</button>
                </div>
            </form>

            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    @include('pasien.layout.customizer')
    @include('pasien.layout.footer')
