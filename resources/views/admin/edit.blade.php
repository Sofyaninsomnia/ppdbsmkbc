@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header></x-layouts.header>

    <x-layouts.aside></x-layouts.aside>

    <main id="main" class="main">

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah data casis</h4>
                    <form action="{{ route('casis.update', $casis->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $casis->nama) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tgl_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $casis->tgl_lahir) }}" required>
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $casis->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-8 col-lg-9">
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="laki-laki" @if(old('jenis_kelamin') == 'laki-laki' || (isset($casis) && $casis->jenis_kelamin == 'laki-laki' && old('jenis_kelamin') == null)) selected @endif>Laki-laki</option>
                                    <option value="perempuan" @if(old('jenis_kelamin') == 'perempuan' || (isset($casis) && $casis->jenis_kelamin == 'perempuan' && old('jenis_kelamin') == null)) selected @endif>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="asal_sekolah" class="col-md-4 col-lg-3 col-form-label">Asal Sekolah</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $casis->asal_sekolah) }}" required>
                                @error('asal_sekolah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jurusan" class="col-md-4 col-lg-3 col-form-label">Jurusan yang Dipilih</label>
                            <div class="col-md-8 col-lg-9">
                                <select class="form-select @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" required>
                                    <option value="Teknik Komputer dan Jaringan" @if(old('jurusan') == 'Teknik Komputer dan Jaringan' || (isset($casis) && $casis->jurusan == 'Teknik Komputer dan Jaringan' && old('jurusan') == null)) selected @endif>Teknik Komputer dan Jaringan</option>
                                    <option value="Rekayasa Perangkat Lunak" @if(old('jurusan') == 'Rekayasa Perangkat Lunak' || (isset($casis) && $casis->jurusan == 'Rekayasa Perangkat Lunak' && old('jurusan') == null)) selected @endif>Rekayasa Perangkat Lunak</option>
                                    <option value="Multimedia" @if(old('jurusan') == 'Multimedia' || (isset($casis) && $casis->jurusan == 'Multimedia' && old('jurusan') == null)) selected @endif>Multimedia</option>
                                    </select>
                                @error('jurusan')
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
        </section>

    </main>

@endsection