@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header />
    <x-layouts.aside />

    <main id="main" class="main">
        <section class="section">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Detail Info Jurusan</h4>
                    <a href="{{ route('info_jurusan.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>

                <div class="card-body">
                    <div class="row gx-5 gy-4">
                        {{-- Logo Jurusan --}}
                        <div class="col-md-3 text-center">
                            <h6>Logo Jurusan</h6>
                            <img 
                                src="{{ $infoJurusan->logo ? asset('storage/' . $infoJurusan->logo) : 'https://via.placeholder.com/150?text=No+Logo' }}"
                                class="img-fluid rounded mb-3"
                                alt="Logo {{ $infoJurusan->jurusan->nama }}"
                                style="max-height:150px;"
                            >
                        </div>

                        {{-- Cover Image --}}
                        <div class="col-md-9 text-center">
                            <h6>Cover</h6>
                            <img 
                                src="{{ $infoJurusan->cover ? asset('storage/' . $infoJurusan->cover) : 'https://via.placeholder.com/600x400?text=No+Image' }}" 
                                class="img-fluid rounded shadow-sm"
                                alt="Cover {{ $infoJurusan->jurusan->nama_jurusan }}"
                            >
                        </div>

                        {{-- Detail Fields --}}
                        <div class="col-12">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="w-25">Nama Jurusan</th>
                                        <td>{{ $infoJurusan->jurusan->nama_jurusan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi Singkat</th>
                                        <td>{{ $infoJurusan->deskripsi_singkat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi Lengkap</th>
                                        <td>{{ $infoJurusan->deskripsi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat pada</th>
                                        <td>{{ $infoJurusan->created_at->translatedFormat('d F Y, H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Diubah pada</th>
                                        <td>{{ $infoJurusan->updated_at->translatedFormat('d F Y, H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('info_jurusan.edit', $infoJurusan->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                    <form action="{{ route('info_jurusan.destroy', $infoJurusan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
