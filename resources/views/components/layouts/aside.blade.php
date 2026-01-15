<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @activeclass('admin/dashboard')" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Main menu</li>

        <li class="nav-item">
            <a class="nav-link @activeclass('admin/daftar/jurusan')" href="{{ route('jurusan.index') }}">
                <i class="bi bi-mortarboard"></i>
                <span>Daftar Jurusan</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"
                aria-expanded="false">
                <i class="bi bi-clipboard2-plus"></i><span>Pendaftaran</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a class="dropdown-item" href="{{ route('tahap_1') }}">
                        <i class="bi bi-circle"></i>
                        Pendaftaran Tahap 1
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('tahap_2') }}">
                        <i class="bi bi-circle"></i>
                        Pendaftaran Tahap 2
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#data-nav" data-bs-toggle="collapse" href="#"
                aria-expanded="false">
                <i class="bi bi-clipboard-data"></i><span>Data Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="data-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">
                <li class="nav-item">
                    <a class="dropdown-item " href="{{ route('data_casis') }}">
                        <i class="bi bi-circle"></i>
                        <span>Data casis</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item " href="/ortu">
                        <i class="bi bi-circle"></i>
                        <span>Data ortu</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link @activeclass('admin/user/management')" href="">
                <i class="bi bi-person-fill-gear"></i>
                <span>User Management</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link @activeclass('berkas')" href="/berkas">
                <i class="bi bi-folder2-open"></i>
                <span>Pemberkasan</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link @activeclass('berkas')" href="/berkas">
                <i class="bi bi-megaphone"></i>
                <span>Pengumuman</span>
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
