@extends('components.layouts.user')

@section('konten')
    <x-layouts.user.header></x-layouts.user.header>

    <x-layouts.user.aside></x-layouts.user.aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data ibu kandung</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('data.ortu') }}">Pendataan orang tua</a></li>
                    <li class="breadcrumb-item active">Data ibu kandung</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Pendataan ibu kandung</h3>
                        <form action="{{ route('kirim.data_ortu') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="nik">Nik</label>
                                <input type="number" name="nik" class="form-control @error('nik')
                                    is-invalid
                                @enderror" placeholder="Massukan nik yang valid">
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama')
                                    is-invalid
                                @enderror" placeholder="Nama lengkap ibu">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="ttl">Tempat Tanggal Lahir</label>
                                <input type="text" name="ttl" class="form-control @error('ttl')
                                    is-invalid
                                @enderror" placeholder="Contoh: Cirebon 22 Maret 1988">
                                @error('ttl')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="no_hp">Nomor Handphone</label>
                                <input type="number" name="no_hp" class="form-control @error('no_hp')
                                    is-invalid
                                @enderror" placeholder="08xx xxxx xxxx">
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="pekerjaan">Pekerjaan ibu</label>
                                <input type="text" name="pekerjaan" class="form-control @error('pekerjaan')
                                    is-invalid
                                @enderror" placeholder="Apa pekerjaan ibu">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="jenis_kelamin" value="perempuan">
                            <div class="form-group mb-2">
                                <label for="pekerjaan">Alamat</label>
                                <textarea name="alamat" rows="5" class="form-control @error('pekerjaan')
                                    is-invalid
                                @enderror" placeholder="alamat rumah lengkap"></textarea>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="{{ route('data.ortu') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
