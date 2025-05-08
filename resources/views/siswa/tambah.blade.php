@extends('siswa.layouts')

@section('konten')

<h4>Form Tambah Siswa</h4>
<form action="{{ route('siswa.store') }}" method="post">
    @csrf
    <label>Nisn</label>
    <input type="number" name="nisn" class="form-control mb-2" placeholder="Maksimal 8 nomor">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control mb-2" placeholder="Minimal 4 karakter">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control mb-2" placeholder="alamat lengkap">
    <label>No HP</label>
    <input type="text" name="no_hp" class="form-control mb-2" placeholder="Masukan nomor yang valid">
    <label>Jenis kelamin</label>
    <input type="text" name="jenis_kelamin" class="form-control mb-2" placeholder="Jenis kelamin">
    <label>Hobi</label>
    <input type="text" name="hobi" class="form-control mb-2" placeholder="(Opsional)">

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
    
@endsection