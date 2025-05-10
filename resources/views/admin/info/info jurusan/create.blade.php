@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header />
    <x-layouts.aside />

    <main id="main" class="main">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tambah Info Jurusan</h4>

                    <form action="{{ route('info_jurusan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Pilih Jurusan --}}
                        <div class="mb-3">
                            <label for="jurusan_id" class="form-label">Nama Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id"
                                class="form-select @error('jurusan_id') is-invalid @enderror">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}" {{ old('jurusan_id') == $j->id ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi Singkat --}}
                        <div class="mb-3">
                            <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                            <input type="text" name="deskripsi_singkat" id="deskripsi_singkat"
                                class="form-control @error('deskripsi_singkat') is-invalid @enderror"
                                value="{{ old('deskripsi_singkat') }}" placeholder="Masukkan deskripsi singkat">
                            @error('deskripsi_singkat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi Lengkap --}}
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Lengkap</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4"
                                placeholder="Masukkan deskripsi lengkap">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Logo --}}
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo Jurusan</label>
                            <input type="file" name="logo" id="logo"
                                class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Logo --}}
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover Jurusan</label>
                            <input type="file" name="cover" id="cover"
                                class="form-control @error('cover') is-invalid @enderror" accept="image/*">
                            @error('cover')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('info_jurusan.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </main>
@endsection
