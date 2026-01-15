@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header />
    <x-layouts.aside />

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data - {{ $pendaftaran->nama_lengkap }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tahap_1') }}">Pendaftaran Tahap 1</a></li>
                    <li class="breadcrumb-item active">Data {{ $pendaftaran->nama_lengkap }}</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('storage/' . ($pendaftaran->pas_foto ?? 'pas_foto/default.jpg')) }}"
                                alt="Foto Profil" class="rounded-circle"
                                style="width: 120px; height: 120px; object-fit: cover;">

                            <h2 class="text-center">{{ $pendaftaran->nama_lengkap ?? 'Nama Calon Siswa' }}</h2>
                            <h3>NISN: {{ $pendaftaran->nisn ?? 'Belum ada NISN' }}</h3>
                            <div class="social-links mt-2">
                                <a href="https://wa.me/62{{ $pendaftaran->no_hp }}" class="whatsapp" target="_blank"
                                    title="Hubungi via WhatsApp">
                                    <i class="bi bi-whatsapp"></i> {{ $pendaftaran->no_hp }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">

                            <div class="tab-content">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Data Lengkap Pendaftaran Tahap 1</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                        <div class="col-lg-9 col-md-8">{{ $pendaftaran->nama_lengkap ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NISN</div>
                                        <div class="col-lg-9 col-md-8">{{ $pendaftaran->nisn ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                        <div class="col-lg-9 col-md-8">{{ $pendaftaran->jenis_kelamin ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Asal Sekolah</div>
                                        <div class="col-lg-9 col-md-8">{{ $pendaftaran->asal_sekolah ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jurusan Pilihan</div>
                                        <div class="col-lg-9 col-md-8">
                                            @if (isset($pendaftaran->jurusan))
                                                {{ $pendaftaran->jurusan->nama_jurusan }}
                                            @else
                                                <span class="text-muted">Jurusan belum ditentukan</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Hp</div>
                                        <div class="col-lg-9 col-md-8">{{ $pendaftaran->no_hp ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Kode Aktivasi Akun</div>
                                        <div class="col-lg-9 col-md-8">{{ $pendaftaran->kode_aktivasi ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Kode Aktivasi Akun</div>
                                        @if ($kode_status->user_id !== null)
                                            <div class="col-lg-9 col-md-8">
                                                <span class="badge bg-success">Sudah Aktif</span>
                                            </div>
                                        @else
                                            <div class="col-lg-9 col-md-8">
                                                <span class="badge bg-danger">Belum Aktif</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
