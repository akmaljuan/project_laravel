<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Main sidebar styling */
        .main-sidebar {
            background-color: #0062cc !important;
            color: #fff !important;
        }

        /* Header styling */
        .main-header {
            background-color: #0062cc !important;
            border-bottom: 1px solid #88d8b0;
        }

        /* Content and footer adjustments */
        .content-wrapper,
        .main-footer {
            transition: margin-left 0.3s ease;
        }

        /* Brand logo area */
        .brand-link {
            padding: 15px !important;
            font-size: 18px !important;
            color: #fff !important;
        }

        .brand-link .brand-image {
            margin-right: 10px !important;
            margin-left: 5px !important;
        }

        /* User panel styling */
        .user-panel {
            padding: 15px 10px !important;
        }

        .user-panel .info {
            font-size: 16px !important;
            padding-left: 10px !important;
            color: #fff !important;
        }

        .user-panel .image img {
            width: 40px !important;
            height: 40px !important;
        }

        /* Sidebar search form */
        .sidebar .form-inline {
            padding: 10px !important;
        }

        .form-control-sidebar {
            height: 38px !important;
            font-size: 15px !important;
        }

        .btn-sidebar {
            width: 40px !important;
            height: 38px !important;
        }

        /* Navigation links */
        .sidebar .nav-pills .nav-link {
            padding: 12px 15px !important;
            font-size: 16px !important;
            border-radius: 5px !important;
            margin: 4px 8px !important;
            color: #fff !important;
        }

        /* Icons in navigation */
        .sidebar .nav-icon {
            font-size: 18px !important;
            margin-right: 10px !important;
        }

        .sidebar .nav-item {
            margin-bottom: 5px !important;
        }

        .sidebar .nav-pills .nav-link.active {
            background-color: #ffffff !important;
            color: #0062cc !important;
            font-weight: 500 !important;
        }

        .sidebar .nav-pills .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2) !important;
            color: #fff !important;
        }

        .sidebar .nav-treeview > .nav-item > .nav-link {
            padding-left: 30px !important;
            font-size: 15px !important;
        }

        @media (min-width: 992px) {
            body.sidebar-mini.sidebar-collapse .main-sidebar {
                width: 80px !important;
            }
            body.sidebar-mini.sidebar-collapse .content-wrapper,
            body.sidebar-mini.sidebar-collapse .main-footer,
            body.sidebar-mini.sidebar-collapse .main-header {
                margin-left: 80px !important;
            }
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="Logo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ auth()->user()->role === 'dokter' ? route('dokter.dashboard') : (auth()->user()->role === 'admin' ? route('admin.index') : route('pasien.dashboard')) }}" class="nav-link">Dashboard</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle"></i> {{ auth()->user()->nama }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item disabled">
                        <i class="fas fa-user mr-2"></i> {{ auth()->user()->email }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar -->
    <aside class="main-sidebar sidebar-light-success elevation-4">
        <a href="#" class="brand-link">
            <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Klinik App</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
                </div>
            </div>

            @include('layouts.sidebar')
        </div>
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }} <a href="#">Klinik App</a>.</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
@stack('scripts')
</body>
</html>
