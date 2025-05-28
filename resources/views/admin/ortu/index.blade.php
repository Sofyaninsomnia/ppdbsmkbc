@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header></x-layouts.header>

    <x-layouts.aside></x-layouts.aside>

    <main id="main" class="main">

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data orang tua</h5>
                    <form action="" method="GET" class="mb-1">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="filterJurusan" class="form-label mb-1">Filter Jurusan:</label>
                                <select class="form-select" id="filterJurusan" name="jurusan_id"
                                    onchange="this.form.submit()">
                                    <option value="">Semua Jurusan</option>


                                    </option>

                                </select>
                            </div>
                            <div class="col-md-5 offset-md-3"> {{-- Menggeser input search ke kanan --}}
                                <label for="search" class="form-label mb-1">Cari Pendaftar:</label>
                                <input type="search" class="form-control" name="search" id="search"
                                    placeholder="Cari NISN, Nama, Asal Sekolah..." value="">
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('ortu.create') }}" class="btn btn-sm btn-primary mb-2">Tambah</a>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>NO HP</th>
                                    <th>PEKERJAAN</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($ortu as $or)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $or->nik }}</td>
                                        <td>{{ $or->nama }}</td>
                                        <td>{{ $or->no_hp }}</td>
                                        <td>{{ $or->pekerjaan }}</td>
                                        <td>{{ $or->jenis_kelamin }}</td>
                                        <td>{{ $or->alamat }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-info"><i class="bi bi-pen"></i></a>
                                            <a href="" class="btn btn-sm btn-warning"><i
                                                    class="bi bi-info-circle"></i></a>
                                            <form action="" method="POST" class="d-inline">

                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data calon siswa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1500,
                showConfirmButton: false
            })
        @endif
    </script>
@endsection
