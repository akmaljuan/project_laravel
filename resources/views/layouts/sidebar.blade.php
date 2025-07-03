<!-- resources/views/layouts/sidebar.blade.php -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="{{ auth()->user()->role === 'dokter' ? route('dokter.dashboard') : (auth()->user()->role === 'admin' ? route('admin.index') : route('pasien.dashboard')) }}" class="brand-link">
        <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PoliklinikCare+</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ auth()->user()->role === 'dokter' ? route('dokter.dashboard') : (auth()->user()->role === 'admin' ? route('admin.index') : route('pasien.dashboard')) }}"
                       class="nav-link {{ Route::is('dokter.dashboard', 'admin.index', 'pasien.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (auth()->user()->role === 'dokter')
                    <li class="nav-item">
                        <a href="{{ route('dokter.jadwal.index') }}" class="nav-link {{ Route::is('dokter.jadwal.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Jadwal Periksa</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.periksa.index') }}" class="nav-link {{ Route::is('dokter.periksa.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-notes-medical"></i>
                            <p>Periksa Pasien</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.riwayat') }}" class="nav-link {{ Route::is('dokter.riwayat') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-history"></i>
                            <p>Riwayat Pasien</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.profil') }}" class="nav-link {{ Route::is('dokter.profil') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil</p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.pasien') }}" class="nav-link {{ Route::is('admin.pasien') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Kelola Pasien</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokter.index') }}" class="nav-link {{ Route::is('dokter.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-md"></i>
                            <p>Kelola Dokter</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.obat') }}" class="nav-link {{ Route::is('admin.obat') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-capsules"></i>
                            <p>Kelola Obat</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.poli') }}" class="nav-link {{ Route::is('admin.poli') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clinic-medical"></i>
                            <p>Kelola Poli</p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role === 'pasien')
                    <li class="nav-item">
                        <a href="{{ route('pasien.poli') }}" class="nav-link {{ Route::is('pasien.poli') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clinic-medical"></i>
                            <p>Poli</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
