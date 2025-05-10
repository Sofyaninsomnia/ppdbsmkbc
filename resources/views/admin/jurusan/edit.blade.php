@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header></x-layouts.header>

    <x-layouts.aside></x-layouts.aside>

    <main id="main" class="main">

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah data casis</h4>
                    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Jurusan</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama_jurusan" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>

                    </form>

                </div>
            </div>
        </section>

    </main>
@endsection
