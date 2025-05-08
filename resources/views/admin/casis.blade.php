@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header></x-layouts.header>

    <x-layouts.aside></x-layouts.aside>

    <main id="main" class="main">

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Calon Siswa</h5>
                    <a href="{{ route('casis.create') }}" class="btn btn-sm btn-primary mb-3">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>ALAMAT</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>JURUSAN</th>
                                    <th>ASAL SEKOLAH</th>
                                    <th>AKSI</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($dataCasis as $casis)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $casis->nama }}</td>
                                        <td>{{ $casis->tgl_lahir }}</td>
                                        <td>{{ $casis->alamat }}</td>
                                        <td>{{ $casis->jenis_kelamin }}</td>
                                        <td>{{ $casis->jurusan }}</td>
                                        <td>{{ $casis->asal_sekolah }}</td>
                                        <td>
                                            <a href="{{ route('casis.edit', $casis->id) }}" class="btn btn-sm btn-info"><i class="bi bi-pen"></i></a>
                                            <form action="{{ route('casis.destroy', $casis->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data calon siswa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1500,
                showConfirmButton: false
            })
        @endif
    </script>

@endsection