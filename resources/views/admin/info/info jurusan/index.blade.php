@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header />
    <x-layouts.aside />

    <main id="main" class="main">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title">Info Jurusan</h4>
                        <a href="{{ route('info_jurusan.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                    </div>

                    @if ($info_jurusan->isEmpty())
                        <p class="alert alert-danger text-center">Belum ada info jurusan.</p>
                    @else
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            @foreach ($info_jurusan as $jurusan)
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        {{-- Gambar cover: dari storage jika ada, else placeholder --}}
                                        <img src="{{ asset('storage/'.$jurusan->cover) }}" class="card-img-top" alt="">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title"></h5>
                                            @if ($jurusan->jurusan->nama_jurusan)
                                                <p class="card-text">{{ $jurusan->jurusan->nama_jurusan }}</p>
                                            @endif
                                            <div class="mt-auto">
                                                <a href="{{ route('info_jurusan.show', $jurusan->id) }}"
                                                    class="btn btn-sm btn-outline-primary me-1">Detail</a>
                                                <a href="{{ route('info_jurusan.edit', $jurusan->id) }}"
                                                    class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                                <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST"
                                                    class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </main>
@endsection
