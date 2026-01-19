<div class="card">
    <div class="card-body">
        <h5 class="card-title">Data Calon Siswa</h5>
            <div class="row align-items-center mb-3">
                <div class="col-md-4">
                    <label for="filterJurusan" class="form-label mb-1">Filter Jurusan:</label>
                    <select class="form-select" id="filterJurusan" wire:model.live="selectedJurusanId">
                        <option value="">Semua Jurusan</option>
                        @foreach ($jurusan as $j)
                            <option value="{{ $j->id }}">
                                {{ $j->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5 offset-md-3">
                    <label for="search" class="form-label mb-1">Cari Pendaftar:</label>
                    <input type="text" wire:model.live.debounce.500ms="search" class="form-control" name="search"
                        class="search" placeholder="Cari NISN, Nama, Asal Sekolah...">
                </div>
            </div>
        <a href="{{ route('getForm_tahap_2') }}" class="btn btn-sm btn-primary mb-2">Tambah</a>

        <div class="table-responsive">
            <table class="table table-search table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIK</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th>JURUSAN</th>
                        <th>ASAL SEKOLAH</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($this->casis as $casis)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $casis->nik }}</td>
                            <td>{{ $casis->nisn }}</td>
                            <td>{{ $casis->nama }}</td>
                            <td>
                                @if ($casis->jurusan)
                                    {{ $casis->jurusan->nama_jurusan }}
                                @else
                                    Belum Ditentukan
                                @endif
                            </td>
                            <td>{{ $casis->asal_sekolah }}</td>
                            <td>
                                <a href="{{ route('formEdit_tahap2', $casis->id) }}" class="btn btn-sm btn-info"><i
                                        class="bi bi-pen"></i></a>
                                <a href="{{ route('showData.tahap2', $casis->id) }}" class="btn btn-sm btn-warning"><i
                                        class="bi bi-info-circle"></i></a>
                                <form action="{{ route('deleteData.tahap2', $casis->id) }}" method="POST"
                                    class="d-inline deleteform">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="bi bi-trash"></i></button>
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
            <div class="mt-2">
                {{ $this->casis->links() }}
            </div>
        </div>
    </div>
</div>
