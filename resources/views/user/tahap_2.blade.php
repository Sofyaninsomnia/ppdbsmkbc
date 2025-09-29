@extends('components.layouts.user')

@section('konten')
    <x-layouts.user.header></x-layouts.user.header>

    <x-layouts.user.aside></x-layouts.user.aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Pendaftaran Tahap 2</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pendaftaran Tahap 2</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                @if (!$user)
                    @include('user.form.create_casis')
                @else
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                @if (!$casis->foto)
                                    <img src="" alt="Foto Profil" class="rounded-circle"
                                        style="width: 120px; height: 120px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/' . ($casis->foto ?? 'pas_foto/default.jpg')) }}"
                                        alt="Foto Profil" class="rounded-circle"
                                        style="width: 120px; height: 120px; object-fit: cover;">
                                @endif

                                <h2 class="text-center">{{ $casis->nama ?? 'Calon siswa' }}</h2>
                                <h3>NISN: {{ $casis->nisn ?? '1234xxxxx' }}</h3>
                                <div class="social-links mt-2">
                                    <a href="https://wa.me/62{{ $casis->no_hp ?? '08xx xx xxxxx' }}" class="whatsapp"
                                        target="_blank" title="Hubungi via WhatsApp">
                                        <i class="bi bi-whatsapp"></i> {{ $casis->no_hp ?? '08xx xxxx xxxx' }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Peringatan</h5>
                                <p>Jika ada data yang salah silahkan hubungi admin</p>
                                <p>Nomor admin: <a href="" class="text-success"><i class="bi bi-whatsapp"></i><span> 089602867121</span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">Overview</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">Tentang Calon Siswa</h5>
                                        <p class="small fst-italic">
                                            {{ $casis->nama ?? 'Calon siswa ini' }}
                                            adalah bagian dari calon peserta didik yang mendaftar di jurusan
                                            {{ $casis->jurusan->nama_jurusan ?? 'yang belum ditentukan' }}.
                                            Informasi lebih lanjut dapat ditemukan di bawah.
                                        </p>

                                        <h5 class="card-title">Detail Lengkap</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                            <div class="col-lg-9 col-md-8">{{ $casis->nama ?? 'Nama Lengkap' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">NISN</div>
                                            <div class="col-lg-9 col-md-8">{{ $casis->nisn ?? '1234567890' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                            <div class="col-lg-9 col-md-8">
                                                {{ ucwords($casis->jenis_kelamin) ?? 'Tidak diketahui' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Asal Sekolah</div>
                                            <div class="col-lg-9 col-md-8">{{ $casis->asal_sekolah ?? 'Belum ada data' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Alamat</div>
                                            <div class="col-lg-9 col-md-8">{{ $casis->alamat ?? 'Belum ada data' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Tempat tanggal lahir</div>
                                            <div class="col-lg-9 col-md-8">{{ $casis->ttl }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Jurusan Pilihan</div>
                                            <div class="col-lg-9 col-md-8">
                                                @if (isset($casis->jurusan))
                                                    {{ $casis->jurusan->nama_jurusan }}
                                                @else
                                                    <span class="text-muted">Jurusan belum ditentukan</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>

    </main>
@endsection
