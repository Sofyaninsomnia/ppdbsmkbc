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
                            <h5 class="card-title">Form Tambah Data Orang tua</h5>

                            <form action="{{ route('ortu.store') }}" method="POST">
                                @csrf

                                <div class="row mb-3">
                                    <label for="nik" class="col-md-4 col-lg-3 col-form-label">Nik</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                            id="nik" name="nik" value="{{ old('nik') }}" required>
                                        @error('nik')
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
                                    <label for="no_hp" class="col-md-4 col-lg-3 col-form-label">No Hp</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                            id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                                        @error('no_hp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="row mb-3">
                                    <label for="pekerjaan" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                            id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" required>
                                        @error('pekerjaan')
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
                                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                            required>{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('ortu.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
