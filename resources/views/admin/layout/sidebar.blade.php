<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="javascript:void(0);" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/images/logo-dark.png" alt="">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="javascript:void(0);" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/images/logo-light.png" alt="">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link" data-key="t-analytics">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('datapasien.index') }}" class="nav-link" data-key="t-analytics">
                        <i class="ri-user-5-line"></i> <span data-key="t-dashboards">Data Pasien</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'apoteker')
                    <li class="nav-item">
                        <a href="{{ route('dataobat.index') }}" class="nav-link" data-key="t-analytics">
                            <i class="ri-health-book-line"></i> <span data-key="t-dashboards">Data Obat</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('resepobat.index') }}" class="nav-link" data-key="t-analytics">
                        <i class="ri-mental-health-line"></i> <span data-key="t-dashboards">Resep Obat</span>
                    </a>
                </li>'
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link" data-key="t-analytics">
                        <i class="ri-account-circle-line"></i> <span data-key="account-circle">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('changepassword.index') }}" class="nav-link" data-key="t-analytics">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Ganti Password</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" data-key="t-analytics">
                        <i class="mdi mdi-logout"></i> <span data-key="t-logout">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
