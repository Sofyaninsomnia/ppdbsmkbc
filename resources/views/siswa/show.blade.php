@extends('siswa.layouts')

@section('konten')

<h4>Detail data siswa</h4>
<div class="table-responsive table-bordered">
    <table class="table">
        <tr>
            <th><b>NISN</b></th>
            <td>{{ old('nisn', $siswa->nisn) }}</td>
        </tr>
        <tr>
            <th><b>NAMA</b></th>
            <td>{{ old('nama', $siswa->nama) }}</td>
        </tr>
        <tr>
            <th><b>ALAMAT</b></th>
            <td>{{ old('alamat', $siswa->alamat) }}</td>
        </tr>
        <tr>
            <th><b>NO HP</b></th>
            <td>{{ old('no_hp', $siswa->no_hp) }}</td>
        </tr>
        <tr>
            <th><b>JENIS KELAMIN</b></th>
            <td>{{ old('jenis_kelamin', $siswa->jenis_kelamin) }}</td>
        </tr>
        <tr>
            <th><b>HOBI</b></th>
            <td>{{ old('hobi', $siswa->hobi) }}</td>
        </tr>
    </table>
    <a href="/siswa" class="btn btn-sm btn-primary">Kembali</a>
</div>

@endsection