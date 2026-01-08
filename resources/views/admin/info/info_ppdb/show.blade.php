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
        <section class="section">
            <div class="row gy-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('storage/' . $pendaftaran->pas_foto) }}" class="img-fluid mt-3 mb-2" width="250px" style="border: 50%" alt="">
                                <h3 class="fw-bold mt-2">{{ $pendaftaran->nama_lengkap }}</h3>
                                <span>{{ $pendaftaran->nisn }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Detail Data - {{ $pendaftaran->nama_lengkap }}</h5>

                            <div class="form-group">
                                <th>Nisn</th>
                                <td>: </td>
                                <td>{{ $pendaftaran->nisn }}</td>
                            </div>
                            <div class="form-group">
                                <th>Nama Lengkap</th>
                                <td>: </td>
                                <td>{{ $pendaftaran->nama_lengkap }}</td>
                            </div>
                            <div class="form-group">
                                <th>Asal Sekolah</th>
                                <td>: </td>
                                <td>{{ $pendaftaran->asal_sekolah }}</td>
                            </div>
                            <div class="form-group">
                                <th>Jenis Kelamin</th>
                                <td>: </td>
                                <td>{{ $pendaftaran->jenis_kelamin }}</td>
                            </div>
                            <div class="form-group">
                                <th>Jurusan Dipilih</th>
                                <td>: </td>
                                <td>{{ $pendaftaran->jurusan->nama_jurusan }}</td>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
