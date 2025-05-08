@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header />
    <x-layouts.aside />

    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Jurusan</h5>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahJurusanModal">
                    Tambah
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA JURUSAN</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jurusan as $index => $jurusan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $jurusan->nama_jurusan }}</td>
                                    <td>
                                        <a href="{{ route('jurusan.edit', $jurusan) }}" class="btn btn-sm btn-info"><i class="bi bi-pen-fill" style="color: white"></i></a>
                                        <form action="{{ route('jurusan.destroy', $jurusan) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data jurusan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="tambahJurusanModal" tabindex="-1" aria-labelledby="tambahJurusanLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahJurusanLabel">Tambah Jurusan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="{{ route('jurusan.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama_jurusan" class="col-form-label">Nama Jurusan</label>
                                        <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
