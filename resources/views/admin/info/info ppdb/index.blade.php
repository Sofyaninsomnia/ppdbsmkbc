@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header />
    <x-layouts.aside />

    <main id="main" class="main">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pendaftar</h5>

                    <form action="{{ route('pendaftaran.index') }}" method="GET" class="mb-3">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="filterJurusan" class="form-label mb-1">Filter Jurusan:</label>
                                <select class="form-select" id="filterJurusan" name="jurusan_id" onchange="this.form.submit()">
                                    <option value="">Semua Jurusan</option>
                                    @foreach ($jurusan as $j)
                                        <option value="{{ $j->id }}" {{ (isset($selectedJurusanId) && $selectedJurusanId == $j->id) ? 'selected' : '' }}>
                                            {{ $j->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 offset-md-3"> {{-- Menggeser input search ke kanan --}}
                                <label for="search" class="form-label mb-1">Cari Pendaftar:</label>
                                <input type="search" class="form-control" name="search" id="search" placeholder="Cari NISN, Nama, Asal Sekolah..." value="{{ request('search') }}">
                            </div>
                        </div>
                    </form>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    @if (session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: '{{ session('success') }}',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        </script>
                    @endif
                    @if (session('error'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: '{{ session('error') }}',
                                showConfirmButton: true
                            });
                        </script>
                    @endif
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        {{-- Bagian datatable-top akan diatur ulang untuk pencarian manual --}}
                        {{-- <div class="datatable-top">
                            <div class="datatable-dropdown">
                                <label>
                                    <select class="datatable-selector" name="per-page">
                                        <option value="5">5</option>
                                        <option value="10" selected="">10</option>
                                        <option value="15">15</option>
                                        <option value="-1">All</option>
                                    </select> entries per page
                                </label>
                            </div>
                            <div class="datatable-search">
                                <input class="datatable-input" placeholder="Search..." type="search" name="search"
                                    title="Search within table">
                            </div>
                        </div> --}}

                        <div class="datatable-container">
                            <table class="table datatable datatable-table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NISN</th>
                                        <th>NAMA LENGKAP</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>JURUSAN</th>
                                        <th>WHAATSAPP</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Hitung nomor urut yang benar untuk setiap halaman
                                        $no = ($pendaftaran->currentPage() - 1) * $pendaftaran->perPage() + 1;
                                    @endphp
                                    @forelse ($pendaftaran as $p)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $p->nisn }}</td>
                                            <td>{{ $p->nama_lengkap }}</td>
                                            <td>{{ $p->asal_sekolah }}</td>
                                            <td>{{ $p->jenis_kelamin }}</td>
                                            <td>{{ $p->jurusan->nama_jurusan ?? '-' }}</td>
                                            <td>{{ $p->no_hp }}</td>
                                            <td>
                                                <a href="https://wa.me/{{ $p->no_hp }}" class="btn btn-sm btn-success" target="_blank"><i
                                                        class="bi bi-whatsapp"></i></a>
                                                <form action="{{ route('pendaftaran.destroy', $p->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data pendaftar yang ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="datatable-bottom">
                            <div class="datatable-info">
                                Menampilkan {{ $pendaftaran->firstItem() }} hingga {{ $pendaftaran->lastItem() }} dari total {{ $pendaftaran->total() }} entri
                            </div>
                            <nav class="datatable-pagination">
                                {{ $pendaftaran->appends(request()->query())->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                        </div>
                    </div>
            </div>
        </section>
    </main>
@endsection