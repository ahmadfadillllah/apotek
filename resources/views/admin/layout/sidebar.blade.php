<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <h3 style="color: rgb(39, 38, 38)">{{ config('app.name') }}</h3>
            </span>
            <span class="logo-lg">
                <h3 style="color: rgb(39, 38, 38)">{{ config('app.name') }}</h3>
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <h3 style="color: rgb(236, 236, 236)">{{ config('app.name') }}</h3>
            </span>
            <span class="logo-lg">
                <h3 style="color: rgb(236, 236, 236)">{{ config('app.name') }}</h3>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
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
                    <a href="javascript:void(0);" class="nav-link" data-key="t-analytics">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Data Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link" data-key="t-analytics">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Data Menu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link" data-key="t-analytics">
                        <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-base-ui">Proses Apriori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link" data-key="t-analytics">
                        <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-base-ui">Proses Hash-Based</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link" data-key="t-analytics">
                        <i class="ri-account-circle-line"></i> <span data-key="account-circle">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link" data-key="t-analytics">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Settings</span>
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
