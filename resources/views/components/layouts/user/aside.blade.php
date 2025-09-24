<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @activeclass('user/dashboard')" href="{{ route('user.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Pendataan</li>

        <li class="nav-item">
            <a class="nav-link @activeclass('user/form/tahap-2')" href="{{ route('form.tahap_2') }}">
                <i class="bi bi-file-person-fill"></i>
                <span>Tahap 2</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @activeclass('user/data_ortu')" href="{{ route('data.ortu') }}">
                <i class="bi bi-people"></i>
                <span>Orang tua</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @activeclass('')" href="/">
                <i class="bi bi-folder2-open"></i>
                <span>Dokumen</span>
            </a>
        </li>

        <li class="nav-heading">Pengaturan</li>

        <li class="nav-item">
            <a class="nav-link @activeclass('')" href="/">
                <i class="bi bi-gear"></i>
                <span>Pengaturan akun</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @activeclass('')" href="/">
                <i class="bi bi-question-circle"></i>
                <span>Bantuan</span>
            </a>
        </li>


    </ul>

</aside><!-- End Sidebar-->
