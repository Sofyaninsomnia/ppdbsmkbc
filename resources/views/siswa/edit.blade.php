@extends('siswa.layouts')

@section('konten')

<h4>Form Edit Siswa</h4>
<form action="{{ route('siswa.update', $siswa->id) }}" method="post">
    @csrf
    @method('PUT')
    <label>Nisn</label>
    <input type="number" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" class="form-control mb-2">
    <label>Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" class="form-control mb-2">
    <label>Alamat</label>
    <input type="text" name="alamat" value="{{ old('alamat', $siswa->alamat) }}" class="form-control mb-2">
    <label>No HP</label>
    <input type="text" name="no_hp" value="{{ old('no_hp', $siswa->no_hp) }}" class="form-control mb-2">
    <label>Jenis kelamin</label>
    <input type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin', $siswa->jenis_kelamin) }}" class="form-control mb-2">
    <label>Hobi</label>
    <input type="text" name="hobi" value="{{ old('hobi', $siswa->hobi) }}" class="form-control mb-2">

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

@endsection