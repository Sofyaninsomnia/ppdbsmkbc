<div class="card">
    <div class="card-body">
        <h5 class="card-title">Data Pendaftar</h5>

        <form action="{{ route('tahap_1') }}" method="GET" class="mb-3">
            <div class="row align-items-center mb-3">
                <div class="col-md-4">
                    <label for="filterJurusan" class="form-label mb-1">Filter Jurusan:</label>
                    <select class="form-select" wire:model.live="selectedJurusan">
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
                    <input type="text" class="form-control" name="search" wire:model.live.debounce.500ms="search"
                        placeholder="Cari NISN, Nama, Asal Sekolah...">
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="datatable-container">
                    <table class="table datatable datatable-table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NISN</th>
                                <th>NAMA LENGKAP</th>
                                <th>ASAL SEKOLAH</th>
                                <th>JENIS KELAMIN</th>
                                <th>JURUSAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->tahap_1 as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nisn }}</td>
                                    <td>{{ $p->nama_lengkap }}</td>
                                    <td>{{ $p->asal_sekolah }}</td>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>{{ $p->jurusan->nama_jurusan ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('show.pendaftar', $p->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a>
                                        <form action="{{ route('pendaftaran.destroy', $p->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data pendaftar yang
                                        ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $this->tahap_1->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
