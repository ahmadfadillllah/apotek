<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/images/logo-sm.png">

    <link rel="stylesheet" href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/libs/%40simonwep/pickr/themes/classic.min.css" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/libs/%40simonwep/pickr/themes/monolith.min.css" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/libs/%40simonwep/pickr/themes/nano.min.css" /> <!-- 'nano' theme -->

    <!-- jsvectormap css -->
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    <!-- quill css -->
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/themesbrand.com/velzon/html/default') }}/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link rel="stylesheet" href="{{ asset('admin') }}/cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{ asset('admin') }}/cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('admin') }}/cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
