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
                        <h4 class="mb-sm-0">Proses Apriori</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Proses Apriori</li>
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
                                        <h4 class="card-title mb-0">Nilai Awal</h4>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mt-3">
                                                <div>
                                                    <label for="basiInput" class="form-label">Min. Support
                                                        Absolute</label>
                                                    <input type="number" class="form-control"
                                                        value="{{ $data['support_absolute'] }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <div>
                                                    <label for="basiInput" class="form-label">Min. Support
                                                        Relative</label>
                                                    <input type="number" class="form-control"
                                                        value="{{ $data['support_relatif'] }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <div>
                                                    <label for="basiInput" class="form-label">Min. Confidence</label>
                                                    <input type="number" class="form-control"
                                                        value="{{ $data['confidence'] }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <div>
                                                    <label for="basiInput" class="form-label">Range</label>
                                                    <input type="text" class="form-control" value="{{ $data['range'] }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col">
                    @include('admin.notification.index')
                    <div class="h-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <!-- Grids in modals -->
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Itemset 1</h5>
                                    </div>

                                    <div class="card-body">
                                        <table id="itemset1"
                                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th data-ordering="false">No</th>
                                                    <th>Item</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['item_list'] as $key => $item)
                                                @php
                                                    $support = ($data['jumlah'][$item] / $data['num']) * 100;
                                                    $lolos = ($support >= $data['support_relatif'])?"1":"0";
                                                    if ($lolos) {
                                                        $itemset1[] = $data['item_list'][$key];//item yg lolos itemset1
                                                        $jumlahItemset1[] = $data['jumlah'][$item];
                                                        $supportItemset1[] = $support;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data['item_list'][$key] }}</td>
                                                    <td>{{ $data['jumlah'][$item] }}</td>
                                                    <td>{{ $support }}</td>
                                                    <td>{{ (($lolos==1)?"Lolos":"Tidak Lolos") }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col">
                    @include('admin.notification.index')
                    <div class="h-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <!-- Grids in modals -->
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Itemset 1 yang lolos:</h5>
                                    </div>

                                    <div class="card-body">
                                        <table id="itemset1lolos"
                                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th data-ordering="false">No</th>
                                                    <th>Item</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemset1 as $key => $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value }}</td>
                                                    <td>{{ $jumlahItemset1[$key] }}</td>
                                                    <td>{{ $supportItemset1[$key] }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col">
                    @include('admin.notification.index')
                    <div class="h-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <!-- Grids in modals -->
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Itemset 2:</h5>
                                    </div>
                                    <div class="card-body">
                                        <table id="itemset2"
                                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Item 1</th>
                                                    <th>Item 2</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemset1 as $key => $value1)
                                                    @foreach ($itemset1 as $key => $value2)
                                                        @php
                                                            $jml_itemset2 = $data['jumlah'][$itemset1[$key]];
                                                            $support2 = ($jml_itemset2/$data['num']) * 100;
                                                            $lolos = ($support2 >= $data['support_relatif'])? 1:0;

                                                            if($lolos){
                                                                $itemset2_var1[] = $value1;
                                                                $itemset2_var2[] = $value2;
                                                                $jumlahItemset2[] = $jml_itemset2;
                                                                $supportItemset2[] = $support2;
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $value1 }}</td>
                                                            <td>{{ $value2 }}</td>
                                                            <td>{{ $jml_itemset2 }}</td>
                                                            <td>{{ $support2 }}</td>
                                                            <td>{{ (($lolos==1)?"Lolos":"Tidak Lolos") }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col">
                    @include('admin.notification.index')
                    <div class="h-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <!-- Grids in modals -->
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Itemset 2 yang lolos:</h5>
                                    </div>
                                    <div class="card-body">
                                        <table id="itemset2lolos"
                                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Item 1</th>
                                                    <th>Item 2</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemset2_var1 as $key => $value3)
                                                        <tr>
                                                            <td>{{ $value3 }}</td>
                                                        <td>{{ $itemset2_var2[$key] }}</td>
                                                        <td>{{ $jumlahItemset2[$key] }}</td>
                                                        <td>{{ $supportItemset2[$key] }}</td>
                                                        </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col">
                    @include('admin.notification.index')
                    <div class="h-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <!-- Grids in modals -->
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Itemset 3:</h5>
                                    </div>
                                    <div class="card-body">
                                        <table id="itemset3"
                                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Item 1</th>
                                                    <th>Item 2</th>
                                                    <th>Item 3</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemset2_var1 as $key => $value3)
                                                            @php
                                                                $jml_itemset3 = $data['jumlah'][$itemset2_var1[$key]];
                                                                $support3 = ($jml_itemset3/$data['num']) * 100;
                                                                $lolos = ($support3 >= $data['support_relatif'])? 1:0;
                                                                if($lolos){
                                                                    $itemset2_var1[] = $value1;
                                                                    $itemset2_var2[] = $value2;
                                                                    $jumlahItemset2[] = $jml_itemset2;
                                                                    $supportItemset2[] = $support2;
                                                                }
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $value1 }}</td>
                                                                <td>{{ $value2 }}</td>
                                                                <td>{{ $value3 }}</td>
                                                                <td>{{ $jml_itemset3 }}</td>
                                                                <td>{{ $support2 }}</td>
                                                                <td>{{ (($lolos==1)?"Lolos":"Tidak Lolos") }}</td>
                                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div>

            {{-- <div class="row">
                <div class="col">
                    @include('admin.notification.index')
                    <div class="h-100">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <!-- Grids in modals -->
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Itemset 3 yang lolos:</h5>
                                    </div>
                                    <div class="card-body">
                                        <table id="itemset3lolos"
                                            class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Item 1</th>
                                                    <th>Item 2</th>
                                                    <th>Jumlah</th>
                                                    <th>Support</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemset2_var1 as $key => $value)
                                                        <td>{{ $value }}</td>
                                                        <td>{{ $itemset2_var2[$key] }}</td>
                                                        <td>{{ $jumlahItemset2[$key] }}</td>
                                                        <td>{{ $supportItemset2[$key] }}</td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div> <!-- end .h-100-->
                </div> <!-- end col -->
            </div> --}}

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@include('admin.layout.customizer')
@include('admin.layout.footer')
