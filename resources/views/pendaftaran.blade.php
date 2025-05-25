<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Tahap Pertama</title>
    <link rel="stylesheet" href="{{ asset('assets/voler/css/bootstrap.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/bc.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/voler/css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
        }

        .back-button {
            display: flex;
            align-items: center;
        }

        .back-button i {
            margin-right: 8px;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">  
                                <img src="{{ asset('assets/img/bc.png') }}" height="48" class="mb-4">
                                <h3>SMK BINA CENDEKIA CIREBON</h3>
                                <p>Pendaftaran online, info selengkapnya akan dihubungi oleh admin.</p>
                            </div>
                            <form action="{{ route('daftar.add_registrasi') }}" method="POST" class="needs-validation"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nisn">NISN</label>
                                            <input type="text"
                                                class="form-control @error('nisn') is-invalid @enderror" name="nisn"
                                                value="{{ old('nisn') }}" placeholder="Masukkan nisn yang valid" required>
                                            @error('nisn')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Nama lengkap calon siswa" required>
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="asal_sekolah">Asal Sekolah</label>
                                            <input type="text"
                                                class="form-control @error('asal_sekolah') is-invalid @enderror"
                                                name="asal_sekolah" value="{{ old('asal_sekolah') }}" placeholder="Asal sekolah" required>
                                            @error('asal_sekolah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" required>
                                                <option value="" selected disabled>Pilih jenis kelamin</option>
                                                <option value="laki-laki"
                                                    {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="perempuan"
                                                    {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jurusan">Jurusan</label>
                                            <select class="form-select @error('jurusan_id') is-invalid @enderror"
                                                name="jurusan_id" required>
                                                <option value="" selected disabled>Pilih jurusan</option>
                                                @foreach ($jurusan as $j)
                                                    <option value="{{ $j->id }}"
                                                        {{ old('jurusan_id') == $j->id ? 'selected' : '' }}>
                                                        {{ $j->nama_jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jurusan_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no_hp">No WhatsApp Aktif</label>
                                            <input type="text"
                                                class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                                value="{{ old('no_hp') }}" placeholder="Harap masukkan nomor yang aktif " required>
                                            @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="pas_foto">Pas foto</label>
                                            <small>File maximal 3mb</small>
                                            <input type="file"
                                                class="form-control @error('pas_foto') is-invalid @enderror"
                                                name="pas_foto" value="{{ old('pas_foto') }}" required>
                                            @error('pas_foto')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button class="btn btn-primary" type="submit">Daftar</button>
                                            <a href="/home" class="btn btn-outline-secondary back-button">
                                                Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if (session('success'))
            // SweetAlert akan menampilkan pesan dan kemudian langsung redirect
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false, // Tidak menampilkan tombol "OK" di sini
                timer: 2000, // Durasi SweetAlert sebelum redirect
                timerProgressBar: true
            }).then(() => {
                // Setelah SweetAlert selesai, browser akan di-redirect
                // ke halaman print yang sudah ditentukan di controller
                window.location.href = "{{ session('redirect_to_print') }}";
            });
        @endif

        // Tangani error validasi dari Laravel
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                showConfirmButton: true,
                confirmButtonText: 'OK',
            });
        @endif
    </script>
    <script src="{{ asset('assets/voler/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/voler/js/app.js') }}"></script>
    <script src="{{ asset('assets/voler/js/main.js') }}"></script>
    <script>
        feather.replace();
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>
