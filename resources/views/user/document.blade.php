@extends('components.layouts.user')

@section('konten')
    <x-layouts.user.header></x-layouts.user.header>
    <x-layouts.user.aside></x-layouts.user.aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Uploads Document</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Uploads Document</li>
                </ol>
            </nav>
        </div>
        
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Unggah Dokumen Pendaftaran</h5>
                            @if (!$exist)
                                <p>Mohon unggah semua dokumen yang diperlukan. Proses verifikasi dokumen akan dilakukan di latar belakang.</p>
                            @else
                                <p>Dokumen akan segera diverifkasi oleh admin dan akan di umumkan ketika disetujui</p>
                            @endif

                            
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Gagal!</strong> Mohon periksa kembali kolom yang Anda isi.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if (!$exist)
                            <form action="{{ route('user.document.upload') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                @csrf

                                {{-- Field Ijazah --}}
                                <div class="col-md-6">
                                    <label for="ijazah" class="form-label">Ijazah Terakhir (Max 5MB, PDF/PNG/JPG)</label>
                                    <input type="file" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" name="ijazah" required>
                                    @error('ijazah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                {{-- Field Akta --}}
                                <div class="col-md-6">
                                    <label for="akta" class="form-label">Akta Kelahiran (Max 5MB, PDF/PNG/JPG)</label>
                                    <input type="file" class="form-control @error('akta') is-invalid @enderror" id="akta" name="akta" required>
                                    @error('akta')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Field KK --}}
                                <div class="col-md-6">
                                    <label for="kk" class="form-label">Kartu Keluarga (KK) (Max 5MB, PDF/PNG/JPG)</label>
                                    <input type="file" class="form-control @error('kk') is-invalid @enderror" id="kk" name="kk" required>
                                    @error('kk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Field Rapot --}}
                                <div class="col-md-6">
                                    <label for="rapot" class="form-label">Raport Nilai Semester Akhir (Max 10MB, Hanya PDF)</label>
                                    <input type="file" class="form-control @error('rapot') is-invalid @enderror" id="rapot" name="rapot" required>
                                    @error('rapot')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                {{-- Tombol Submit --}}
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Unggah Semua Dokumen</button>
                                </div>
                            </form>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
@endsection