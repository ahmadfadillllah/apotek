@include('admin.layout.head')
@include('admin.layout.header')
@include('admin.layout.sidebar')
@include('admin.notification.index')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                <div class="row g-4">
                    <div class="col-auto">
                        <div class="avatar-lg">
                            <img src="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/images/{{ Auth::user()->avatar }}" alt="user-img" class="img-thumbnail rounded-circle" />
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col">
                        <div class="p-2">
                            <h3 class="text-white mb-1">{{ Auth::user()->name }}</h3>
                            <p class="text-white-75">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                                    </a>
                                </li>
                            </ul>
                            {{-- <div class="flex-shrink-0">
                                <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editProfile"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                            </div> --}}
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xxl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Info</h5>
                                                <div class="live-preview">
                                                    <form action="{{ route('changepassword.update') }}" method="post">
                                                        @csrf
                                                        <div class="row gy-4">
                                                            <div class="col-xxl-3 col-md-6">
                                                                <div>
                                                                    <label for="exampleInputpassword" class="form-label">Password Sekarang</label>
                                                                    <input type="password" class="form-control" id="exampleInputpassword" name="passwordsekarang">
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-3 col-md-6">
                                                                <div>
                                                                    <label for="exampleInputpassword" class="form-label">Password Baru</label>
                                                                    <input type="password" class="form-control" id="exampleInputpassword" name="passwordbaru">
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn rounded-pill btn-primary waves-effect waves-light">Ubah Password</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                            <!--end tab-pane-->
                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div>
@include('admin.layout.customizer')
@include('admin.layout.footer')
