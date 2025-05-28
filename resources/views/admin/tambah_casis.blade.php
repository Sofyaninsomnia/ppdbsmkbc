@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header></x-layouts.header>

    <x-layouts.aside></x-layouts.aside>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Tambah Data Calon Siswa</h5>

                            <form action="{{ route('casis.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="nisn" class="col-md-4 col-lg-3 col-form-label">Nisn</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                            id="nisn" name="nisn" value="{{ old('nisn') }}" required>
                                        @error('nisn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tgl_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                            required>{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="agama" class="col-md-4 col-lg-3 col-form-label">Agama</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                            id="agama" name="agama" value="{{ old('agama') }}" required>
                                        @error('agama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis
                                        Kelamin</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                            id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="laki-laki"
                                                {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="perempuan"
                                                {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="ayah_id" class="col-md-4 col-lg-3 col-form-label">Nama ayah</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="ayah_id" id="ayah_id"
                                            class="form-select @error('ayah_id') is-invalid @enderror">
                                            <option value="">-- Nama ayah --</option>
                                            @foreach ($ayah as $o)
                                                <option value="{{ $o->id }}"
                                                    {{ old('ayah_id') == $o->id ? 'selected' : '' }}>
                                                    {{ $o->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ayah_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="ibu_id" class="col-md-4 col-lg-3 col-form-label">Nama ibu</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="ibu_id" id="ibu_id"
                                            class="form-select @error('ibu_id') is-invalid @enderror">
                                            <option value="">-- Nama ibu --</option>
                                            @foreach ($ibu as $j)
                                                <option value="{{ $j->id }}"
                                                    {{ old('ibu_id') == $j->id ? 'selected' : '' }}>
                                                    {{ $j->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ibu_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="asal_sekolah" class="col-md-4 col-lg-3 col-form-label">Asal Sekolah</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text"
                                            class="form-control @error('asal_sekolah') is-invalid @enderror"
                                            id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                                            required>
                                        @error('asal_sekolah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="foto" class="col-md-4 col-lg-3 col-form-label">Pas foto</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                            id="foto" name="foto" value="{{ old('foto') }}" required>
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">No Whaatsapp</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                            id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                                        @error('no_hp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="jurusan_id" class="col-md-4 col-lg-3 col-form-label">Nama Jurusan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="jurusan_id" id="jurusan_id"
                                            class="form-select @error('jurusan_id') is-invalid @enderror">
                                            <option value="">-- Pilih Jurusan --</option>
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

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('casis.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
