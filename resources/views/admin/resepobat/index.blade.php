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
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <div class="card">
                    <div class="card-body">
                      <a href="#" class="btn btn-primary" style="background-color: yellow"></a> Pasien Yang belum diperiksa
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <a href="#" class="btn btn-primary" style="background-color: aquamarine"></a>  Pasien Yang telah diperiksa
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                @foreach ($pasien as $p)
                @if ($p->antrian->no_antrian != null and Auth::user()->role != 'apoteker')
                <div class="col-xl-4">
                    @if ($p->keluhan->keluhan == null)
                    <div class="card" style="background-color: yellow">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><i class="ri-user-3-fill align-middle me-1 text-muted"></i> {{ $p->nama_lengkap }}</h4>
                            <p class="text-muted">No. Antrian: <span class="badge badge-gradient-primary">{{ $p->antrian->no_antrian }}</span></p>
                            <p class="text-muted mb-0">NIK: {{ $p->nik_ktp }}</p>
                            <p class="text-muted mb-0">No. Handphone: {{ $p->nohp }}</p>
                        </div>
                        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'dokter' or Auth::user()->role == 'apoteker')
                        <div class="card-footer text-center">
                            @if ($p->antrian->no_antrian == $no_antrian)
                            <a href="{{ route('resepobat.resep', $p->id) }}" class="link-secondary">Resep Obat<i class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                            @endif
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="card" style="background-color: aquamarine">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><i class="ri-user-3-fill align-middle me-1 text-muted"></i> {{ $p->nama_lengkap }}</h4>
                            <p class="text-muted">No. Antrian: <span class="badge badge-gradient-primary">{{ $p->antrian->no_antrian }}</span></p>
                            <p class="text-muted mb-0">NIK: {{ $p->nik_ktp }}</p>
                            <p class="text-muted mb-0">No. Handphone: {{ $p->nohp }}</p>
                        </div>
                        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'dokter' or Auth::user()->role == 'apoteker')
                        <div class="card-footer text-center">
                            @if ($p->antrian->no_antrian == $no_antrian)
                            <a href="{{ route('resepobat.resep', $p->id) }}" class="link-secondary">Resep Obat<i class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                            @endif
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
                @else
                <div class="col-xl-4">
                    @if ($p->keluhan->keluhan == null)
                    <div class="card" style="background-color: yellow">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><i class="ri-user-3-fill align-middle me-1 text-muted"></i> {{ $p->nama_lengkap }}</h4>
                            <p class="text-muted">No. Antrian: <span class="badge badge-gradient-primary">{{ $p->antrian->no_antrian }}</span></p>
                            <p class="text-muted mb-0">NIK: {{ $p->nik_ktp }}</p>
                            <p class="text-muted mb-0">No. Handphone: {{ $p->nohp }}</p>
                        </div>
                        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'dokter' or Auth::user()->role == 'apoteker')
                        <div class="card-footer text-center">
                            @if ($p->antrian->no_antrian == $no_antrian and Auth::user()->role != 'apoteker')
                            <a href="{{ route('resepobat.resep', $p->id) }}" class="link-secondary">Resep Obat<i class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                            @endif
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="card" style="background-color: aquamarine">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><i class="ri-user-3-fill align-middle me-1 text-muted"></i> {{ $p->nama_lengkap }}</h4>
                            <p class="text-muted">No. Antrian: <span class="badge badge-gradient-primary">{{ $p->antrian->no_antrian }}</span></p>
                            <p class="text-muted mb-0">NIK: {{ $p->nik_ktp }}</p>
                            <p class="text-muted mb-0">No. Handphone: {{ $p->nohp }}</p>
                        </div>
                        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'dokter' or Auth::user()->role == 'apoteker')
                        <div class="card-footer text-center">
                            @if (Auth::user()->role == 'apoteker')
                            <a href="{{ route('resepobat.resep', $p->id) }}" class="link-secondary">Resep Obat<i class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                            @endif
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
                @endif
                @endforeach
            </div><!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@include('admin.layout.customizer')
@include('admin.layout.footer')
