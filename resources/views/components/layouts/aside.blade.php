<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @activeclass('admin')" href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Main menu</li>

        <li class="nav-item">
            <a class="nav-link @activeclass('jurusan')" href="/jurusan">
                <i class="bi bi-mortarboard"></i>
                <span>Daftar Jurusan</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"
                aria-expanded="false">
                <i class="bi bi-info-circle"></i><span>Informasi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a class="dropdown-item @activeclass('info_jurusan')" href="/info_jurusan">
                        <i class="bi bi-circle"></i>
                        Info Jurusan
                    </a>
                </li>
                <li>
                    <a class="dropdown-item @activeclass('pendaftaran')" href="/pendaftaran">
                        <i class="bi bi-circle"></i>
                        Info Pendaftaran
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#data-nav" data-bs-toggle="collapse" href="#"
                aria-expanded="false">
                <i class="bi bi-people"></i><span>Data pendaftar</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="data-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                <li class="nav-item">
                    <a class="dropdown-item @activeclass('casis')" href="/casis">
                        <i class="bi bi-circle"></i>
                        <span>Data casis</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item @activeclass('casis')" href="/casis">
                        <i class="bi bi-circle"></i>
                        <span>Data ortu</span>
                    </a>
                </li>
            </ul>
        </li>




        <li class="nav-item">
            <a class="nav-link @activeclass('berkas')" href="/berkas">
                <i class="bi bi-folder2-open"></i>
                <span>Pemberkasan</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link @activeclass('laporan')" href="/casis">
                <i class="bi bi-journals"></i>
                <span>Laporan</span>
            </a>
        </li>


    </ul>

</aside><!-- End Sidebar-->
