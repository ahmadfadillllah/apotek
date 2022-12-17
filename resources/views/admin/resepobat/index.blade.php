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
            <!-- end page title -->

            <div class="row">
                @foreach ($pasien as $p)
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><i class="ri-user-3-fill align-middle me-1 text-muted"></i> {{ $p->datapasien->nama_lengkap }}</h4>
                            <p class="text-muted">No. Antrian: <span class="badge badge-gradient-primary">{{ $p->no_antrian }}</span></p>
                            <p class="text-muted mb-0">NIK: {{ $p->datapasien->nik_ktp }}</p>
                            <p class="text-muted mb-0">No. Handphone: {{ $p->datapasien->nohp }}</p>
                        </div>
                        @if (Auth::user()->role == 'dokter' or Auth::user()->role == 'apoteker')
                        <div class="card-footer text-center">
                            <a href="{{ route('resepobat.resep', $p->id) }}" class="link-secondary">Resep Obat<i class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div><!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@include('admin.layout.customizer')
@include('admin.layout.footer')
