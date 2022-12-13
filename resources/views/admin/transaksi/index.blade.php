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
                        <h4 class="mb-sm-0">Transaksi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Transaksi</li>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Tambah Transaksi</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <form action="{{ route('transaksi.insert') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label class="form-label mb-0">Tanggal Transaksi</label>
                                                        <input type="text" class="form-control" data-provider="flatpickr" name="tanggal" data-date-format="Y-m-d" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label mb-0">Item</label>
                                                        <input type="text" class="form-control" name="item" id="item" onkeyup="myFunction()">
                                                        <p>Pisahkan dengan tanda (,) tanpa spasi</p>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mt-3">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>


                                            <!-- end row -->

                                        </form><!-- end form -->
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<script>
    function myFunction() {
        var x = document.getElementById("item");
        x.value = x.value.toUpperCase();
    }
    </script>
@include('admin.layout.customizer')
@include('admin.layout.footer')
