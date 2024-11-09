<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard-guru') }}">
        <div class="sidebar-brand-icon">
        <img src="img/logo.png" alt="" class="logo">
        </div>
        <div class="sidebar-brand-text mx-3">Bimbingan Konseling</div>
    </a>
    
    <!-- Heading -->
    <div class="sidebar-heading mt-3" style="color: white; font-size : 0.8rem;">
        MENU BK
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard-guru') }}">
        <i class="bi bi-house-door-fill"></i>
        <span>Home</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>Bimbingan Siswa</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="">
            <i class="bi bi-clipboard2-data-fill"></i>
            <span>Konsultasi Siswa</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="">
            <i class="bi bi-person-workspace"></i>
            <span>Kunjungan</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->