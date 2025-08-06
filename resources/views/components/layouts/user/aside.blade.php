<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @activeclass('dashboard')" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Pendataan</li>

        <li class="nav-item">
            <a class="nav-link @activeclass('user/calon_siswa')" href="{{ route('user/calon_siswa') }}">
                <i class="bi bi-people"></i>
                <span>Calon siswa</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @activeclass('data_ortu')" href="/data_ortu">
                <i class="bi bi-people"></i>
                <span>Orang tua</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @activeclass('jurusan')" href="/jurusan">
                <i class="bi bi-folder2-open"></i>
                <span>Dokumen</span>
            </a>
        </li>

        <li class="nav-heading">Pengaturan</li>

        <li class="nav-item">
            <a class="nav-link @activeclass('jurusan')" href="/jurusan">
                <i class="bi bi-gear"></i>
                <span>Pengaturan akun</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @activeclass('jurusan')" href="/jurusan">
                <i class="bi bi-question-circle"></i>
                <span>Bantuan</span>
            </a>
        </li>


    </ul>

</aside><!-- End Sidebar-->
