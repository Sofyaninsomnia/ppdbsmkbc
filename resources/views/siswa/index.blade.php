@extends('siswa.layouts')

@section('konten')

<div class="d-flex">
    <h4>List siswa</h4>

    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('siswa.create') }}">Tambah siswa</a>
    </div>
</div>
<br>

<div class="table-responsive table-bordered">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nisn</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Jenis kelamin</th>
            <th>Hobi</th>
            <th style="width: 20%">Aksi</th>
        </tr>
        @forelse ($siswa as $no=>$data)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->nisn }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->no_hp }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->hobi }}</td>
            <td class="text-center">
                <form onsubmit="return confirm('yakin mau dihapus?')" action="{{ route('siswa.destroy', $data->id) }}" method="post">
                    <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('siswa.show', $data->id) }}" class="btn btn-sm btn-warning">Info</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger">
            Data belum tersedia
        </div>
        @endforelse
    </table>
</div>
    
@endsection