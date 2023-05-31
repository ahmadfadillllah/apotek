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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Data Pasien <span class="badge badge-gradient-primary">Status : {{ $pasien->antrian->statusantrian }}</span></h4>
                            <h5>Lama Menunggu : <span id="jam"></span></h5>

                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row gy-4">
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="readonlyInput" class="form-label">No. Antrian</label>
                                            <input type="text" class="form-control"value="@if ($pasien->antrian->no_antrian == NULL)Belum Mengambil No.Antrian @else{{ $pasien->antrian->no_antrian }}@endif" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="readonlyInput" class="form-label">NIK</label>
                                            <input type="text" class="form-control"value="{{ $pasien->nik_ktp }}" readonly>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="readonlyInput" class="form-label">Nama</label>
                                            <input type="text" class="form-control"value="{{ $pasien->nama_lengkap }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="readonlyInput" class="form-label">No. Handphone</label>
                                            <input type="text" class="form-control"value="{{ $pasien->nohp }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="readonlyInput" class="form-label">Tempat dan Tanggal Lahir</label>
                                            <input type="text" class="form-control"value="{{ $pasien->tempat_lahir }}, {{ date('d M Y', strtotime($pasien->tanggal_lahir)) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="readonlyInput" class="form-label">Alamat Rumah</label>
                                            <input type="text" class="form-control"value="{{ $pasien->alamat }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="readonlyInput" class="form-label">Jenis Kelamin</label>
                                            <input type="text" class="form-control"value="{{ $pasien->jenis_kelamin }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="readonlyInput" class="form-label">Poli</label>
                                            <input type="text" class="form-control"value="{{ $pasien->poli }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-md-12">
                                        <div>
                                            <label for="exampleFormControlTextarea5" class="form-label">Keluhan</label>
                                            <textarea class="form-control"rows="3" readonly>@if ($pasien->keluhan->keluhan == NULL)Belum berkonsultasi dengan dokter @else{{ $pasien->keluhan->keluhan }}@endif</textarea>
                                        </div>
                                    </div>
                                    <p>*Jika terdapat kesalahan data, silahkan melaporkan ke Perawat</p>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>

            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <script type="text/javascript">
        window.onload = function() { jam(); }

        function jam() {

         var e = document.getElementById('jam'),
         d = new Date(), h, m, s;
         h = {{ $time->h }};
         m = {{ $time->i }};
         s = {{ $time->s }};

         e.innerHTML = h +':'+ m +':'+ s;

         setTimeout('jam()', 1000);
        }

        function set(e) {
         e = e < 10 ? '0'+ e : e;
         return e;
        }
       </script>
    @include('pasien.layout.customizer')
    @include('pasien.layout.footer')
