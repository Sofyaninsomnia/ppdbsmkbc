@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header></x-layouts.header>
    <x-layouts.aside></x-layouts.aside>

    <main id="main" class="main">

        {{-- Bagian Judul Halaman dan Breadcrumbs --}}
        <div class="pagetitle">
            <h1>Detail Calon Siswa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('casis.index') }}">Data Casis</a></li>
                    <li class="breadcrumb-item active">Detail Casis</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('storage/' . ($casis->foto ?? 'pas_foto/default.jpg')) }}" alt="Foto Profil" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">

                            <h2 class="text-center">{{ $casis->nama ?? 'Nama Calon Siswa' }}</h2>
                            <h3>NISN: {{ $casis->nisn ?? 'Belum ada NISN' }}</h3>
                            <div class="social-links mt-2">
                                    <a href="https://wa.me/62{{ $casis->no_hp }}" class="whatsapp" target="_blank" title="Hubungi via WhatsApp">
                                        <i class="bi bi-whatsapp"></i> {{ $casis->no_hp }}
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-data">Data Lengkap</button>
                                </li>
                            </ul>

                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Tentang Calon Siswa</h5>
                                    <p class="small fst-italic">
                                        {{ $casis->nama ?? 'Calon siswa ini' }} adalah bagian dari calon peserta didik yang mendaftar di jurusan {{ $casis->jurusan->nama ?? 'yang belum ditentukan' }}.
                                        Informasi lebih lanjut dapat ditemukan di bawah.
                                    </p>

                                    <h5 class="card-title">Detail Cepat</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                        <div class="col-lg-9 col-md-8">{{ $casis->nama ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">NISN</div>
                                        <div class="col-lg-9 col-md-8">{{ $casis->nisn ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                        <div class="col-lg-9 col-md-8">{{ $casis->jenis_kelamin ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Asal Sekolah</div>
                                        <div class="col-lg-9 col-md-8">{{ $casis->asal_sekolah ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jurusan Pilihan</div>
                                        <div class="col-lg-9 col-md-8">
                                            @if(isset($casis->jurusan))
                                                {{ $casis->jurusan->nama_jurusan }}
                                            @else
                                                <span class="text-muted">Jurusan belum ditentukan</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-data pt-3" id="profile-data">
                                    <h5 class="card-title">Data Lengkap Calon Siswa</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                                        <div class="col-lg-9 col-md-8">: {{ \Carbon\Carbon::parse($casis->tgl_lahir ?? now())->format('d F Y') }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat Lengkap</div>
                                        <div class="col-lg-9 col-md-8">: {{ $casis->alamat ?? '-' }}</div>
                                    </div>
                                    @if (isset($casis->no_hp) && !empty($casis->no_hp))
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Nomor HP</div>
                                            <div class="col-lg-9 col-md-8">: {{ $casis->no_hp }}</div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Ayah kandung</div>
                                        <div class="col-lg-9 col-md-8">: {{ $casis->ayah->nama ?? '-' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Ibu kandung</div>
                                        <div class="col-lg-9 col-md-8">: {{ $casis->ibu->nama ?? '-' }}</div>
                                    </div>
                                    {{-- Tambahkan baris-baris lain untuk data casis yang ingin Anda tampilkan --}}
                                    {{-- Contoh:
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $casis->email ?? '-' }}</div>
                                    </div>
                                    --}}
                                </div>
                            </div></div>
                    </div>
                </div>
            </div>
        </section>

    </main>@push('scripts')
        {{-- Pastikan pustaka JavaScript untuk Bootstrap (terutama untuk fungsi tab) dimuat. --}}
        {{-- Contoh jika Anda menggunakan Bootstrap 5 (biasanya sudah termasuk di template admin): --}}
        {{-- <script src="{{ asset('path/to/bootstrap.bundle.min.js') }}"></script> --}}

        {{-- Jangan lupa untuk mengimpor Illuminate\Support\Str di controller atau di awal Blade jika diperlukan. --}}
        @php use Illuminate\Support\Str; @endphp
    @endpush

@endsection