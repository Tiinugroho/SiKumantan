<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-envelope-open-text"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Surat</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    @role('staff-Tu')
    <!-- Data Pengguna -->
    <li class="nav-item {{ request()->routeIs('data.user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('data.user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pengguna</span>
        </a>
    </li>
    @endrole
    <!-- Surat Keluar -->
    @role('sekretaris')
    <li class="nav-item {{ request()->routeIs('admin.suratkeluar.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.suratkeluar.index') }}">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Surat Keluar</span>
        </a>
    </li>
    @endrole

    <!-- Data Surat (with Collapse submenu) -->
    @role('staff-Tu')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurat" aria-expanded="true" aria-controls="collapseSurat">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Surat Masuk</span>
        </a>
        <div id="collapseSurat" class="collapse {{ request()->is('admin/surat*') ? 'show' : '' }}" aria-labelledby="headingSurat" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis Surat:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.admin-datasurat.keterangan_tidak_mampu') ? 'active' : '' }}" href="{{ route('admin.admin-datasurat.keterangan_tidak_mampu') }}">Surat Tidak Mampu</a>
                <a class="collapse-item" href="#">Surat Belum Menikah</a>
                <a class="collapse-item" href="#">Surat Domisili</a>
                <a class="collapse-item" href="#">Surat Keterangan Lain</a>
            </div>
        </div>
    </li>
    @endrole

    <hr class="sidebar-divider">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>
