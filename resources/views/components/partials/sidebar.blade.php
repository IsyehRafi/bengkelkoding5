<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <i class="fas fa-clinic-medical brand-image" style="font-size: 2rem; color: #fff;"></i>
        <span class="brand-text font-weight-light">Poliklinik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user-circle" style="font-size: 2rem; color: #fff;"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard Admin</p>
                    </a>
                </li>

                <!-- Manajemen Poli -->
                <li class="nav-item">
                    <a href="{{ route('polis.index') }}" class="nav-link {{ request()->routeIs('polis.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Manajemen Poli</p>
                    </a>
                </li>

                <!-- Manajemen Dokter -->
                <li class="nav-item">
                    <a href="{{ route('dokter.index') }}" class="nav-link {{ request()->routeIs('dokter.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Manajemen Dokter</p>
                    </a>
                </li>

                <!-- Manajemen Pasien -->
                <li class="nav-item">
                    <a href="{{ route('pasien.index') }}" class="nav-link {{ request()->routeIs('pasien.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>Manajemen Pasien</p>
                    </a>
                </li>

                <!-- Manajemen Obat -->
                <li class="nav-item">
                    <a href="{{ route('obat.index') }}" class="nav-link {{ request()->routeIs('obat.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>Manajemen Obat</p>
                    </a>
                </li>

                <!-- Divider -->
                <li class="nav-header">MENU LAINNYA</li>

                <!-- Logout -->
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Hidden logout form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
