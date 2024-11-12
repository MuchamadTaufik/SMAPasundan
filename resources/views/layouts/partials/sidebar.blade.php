<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
        <img src="img/logo.png" alt="" class="logo">
        </div>
        <div class="sidebar-brand-text mx-3">Bimbingan Konseling</div>
    </a>
    
    <!-- Heading -->
    <div class="sidebar-heading mt-3" style="color: white; font-size : 0.8rem;">
        MENU
    </div>
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="bi bi-house-door-fill"></i>
        <span>Home</span></a>
    </li>
    @can('isGuru')
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('bimbingan*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{ route('bimbingan') }}">
                <i class="bi bi-clipboard-data-fill"></i>
                <span>Bimbingan Siswa</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ Route::is('konsultasi*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{ route('konsultasi') }}">
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
    @endcan
    @can('isAdmin')
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('akun.pengguna*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{ route('akun.pengguna') }}">
                <i class="bi bi-people"></i>
                <span>Akun Pengguna</span>
            </a>
        </li>

        <li class="nav-item {{ Route::is('guru*','siswa*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
                aria-expanded="true" aria-controls="collapseAccount">
                <i class="bi bi-person-badge"></i>
                <span>Warga Sekolah</span>
            </a>
            <div id="collapseAccount" class="collapse" aria-labelledby="headingAccount"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('guru') }}">Guru BK</a>
                    <a class="collapse-item" href="{{ route('siswa') }}">Siswa</a>
                </div>
            </div>
        </li>

        <li class="nav-item {{ Route::is('semester*','kelas*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="bi bi-clipboard-data-fill"></i>
                <span>Data</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('semester') }}">Semester</a>
                    <a class="collapse-item" href="{{ route('kelas') }}">Kelas</a>
                </div>
            </div>
        </li>
    @endcan
    @can('isSiswa')
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('pengajuan*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{ route('pengajuan') }}">
                <i class="bi bi-file-arrow-down"></i>
                <span>Pengajuan Konsultasi</span>
            </a>
        </li>

        <li class="nav-item {{ Route::is('data*','bimbingan*', 'kunjungan*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="bi bi-clipboard-data-fill"></i>
                <span>Data</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('data.konsultasi') }}">Jadwal Konsultasi</a>
                    <a class="collapse-item" href="">Jadwal Bimbingan</a>
                    <a class="collapse-item" href="">Jadwal Kunjungan</a>
                </div>
            </div>
        </li>
        
    @endcan

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->