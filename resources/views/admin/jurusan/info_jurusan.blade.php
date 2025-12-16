@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header />
    <x-layouts.aside />

    <main id="main" class="main">
        <section class="section">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Detail Info Jurusan</h4>
                    <div class="d-flex gap-1">
                        @if (!$info->info)
                            <a href="{{ route('info_jurusan.create') }}" class="btn btn-primary">Lengkapi</a>
                        @endif
                        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (!$info->info)
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/404.jpg') }}" alt="" class="img-fluid" width="550px">
                        </div>
                    @else
                        <div class="row gx-5 gy-4">
                            {{-- Logo Jurusan --}}
                            <div class="col-md-3 text-center">
                                <h6>Logo Jurusan</h6>
                                <img src="{{ $info->info->logo ? asset('storage/' . $info->info->logo) : 'https://via.placeholder.com/150?text=No+Logo' }}"
                                    class="img-fluid rounded mb-3" alt="Logo {{ $info->nama_jurusan }}"
                                    style="max-height:150px;">
                            </div>

                            {{-- Cover Image --}}
                            <div class="col-md-9 text-center">
                                <h6>Cover</h6>
                                <img src="{{ $info->info->cover ? asset('storage/' . $info->info->cover) : 'https://via.placeholder.com/600x400?text=No+Image' }}"
                                    class="img-fluid rounded shadow-sm" alt="Cover {{ $info->nama_jurusan }}">
                            </div>

                            {{-- Detail Fields --}}
                            <div class="col-12">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th class="w-25">Nama Jurusan</th>
                                            <td>{{ $info->nama_jurusan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi Singkat</th>
                                            <td>{{ $info->info->deskripsi_singkat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi Lengkap</th>
                                            <td>{{ $info->info->deskripsi }}</td>
                                        </tr>
                                        <tr>
                                            <th>Dibuat pada</th>
                                            <td>{{ $info->info->created_at->translatedFormat('d F Y, H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Diubah pada</th>
                                            <td>{{ $info->info->updated_at->translatedFormat('d F Y, H:i') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>

                @if ($info->info)
                    <div class="card-footer">
                        <a href="{{ route('info_jurusan.edit', $info->info->id) }}"
                            class="btn btn-primary">Edit</a>
                        <form action="{{ route('info_jurusan.destroy', $info->info->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
