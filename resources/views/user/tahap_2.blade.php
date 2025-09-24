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
                    <div class="alert alert-danger text-center">
                        Anda belum mendaftar tahap 2. Mohon untuk daftar terlebih dahulu
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Formulir Pendaftaran Tahap 2</h3>
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama"
                                        placeholder="Nama Lengkap siswa..." autocomplete="off">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="text" name="ttl" class="form-control"
                                        placeholder="Contoh: Cirebon, 22 Juni 2007">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" rows="5" class="form-control" placeholder="Alamat lengkap"></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select">
                                        <option value="" selected disabled>Pilih</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="jurusan_id">Jurusan</label>
                                    <select name="jurusan_id" class="form-select">
                                        <option value="" disabled selected>Pilih Jurusan</option>
                                        @foreach ($jurusan as $jurusan)
                                            <option value="{{ $jurusan->id }}">
                                                {{ $jurusan->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="asal_sekolah">Asal Sekolah</label>
                                    <input type="text" name="asal_sekolah" class="form-control"
                                        placeholder="Asal sekolah siswa...">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="no_hp">No Whatsapp Aktif</label>
                                    <input type="number" name="no_hp" class="form-control" placeholder="08xx xxxx xxx">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="foto">Pas Foto</label><small class="text-danger"> maximal 10mb</small>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
                    </div>

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">Overview</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-data">Data
                                            Lengkap</button>
                                    </li>
                                </ul>

                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">Tentang Calon Siswa</h5>
                                        <p class="small fst-italic">
                                            {{ $casis->nama ?? 'Calon siswa ini' }}
                                            adalah bagian dari calon peserta didik yang mendaftar di jurusan
                                            {{ $casis->jurusan->nama ?? 'yang belum ditentukan' }}.
                                            Informasi lebih lanjut dapat ditemukan di bawah.
                                        </p>

                                        <h5 class="card-title">Detail Cepat</h5>
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
                                                {{ $casis->jenis_kelamin ?? 'Tidak diketahui' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Asal Sekolah</div>
                                            <div class="col-lg-9 col-md-8">{{ $casis->asal_sekolah ?? 'Belum ada data' }}
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

                                    <div class="tab-pane fade profile-data pt-3" id="profile-data">
                                        <h5 class="card-title">Data Lengkap Calon Siswa</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                                            <div class="col-lg-9 col-md-8">:
                                                {{ \Carbon\Carbon::parse($casis->tgl_lahir ?? now())->format('d F Y') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Alamat Lengkap</div>
                                            <div class="col-lg-9 col-md-8">: {{ $casis->alamat ?? 'Belum ada data' }}
                                            </div>
                                        </div>
                                        @if (isset($casis->no_hp) && !empty($casis->no_hp))
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Nomor HP</div>
                                                <div class="col-lg-9 col-md-8">: {{ $casis->no_hp }}</div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Ayah kandung</div>
                                            <div class="col-lg-9 col-md-8">: Ayah</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Ibu kandung</div>
                                            <div class="col-lg-9 col-md-8">: Ibu</div>
                                        </div>
                                        {{-- Tambahkan baris-baris lain untuk data casis yang ingin Anda tampilkan --}}
                                        {{-- Contoh:
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $casis->email ?? '-' }}</div>
                                    </div>
                                    --}}
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
