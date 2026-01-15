@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header></x-layouts.header>

    <x-layouts.aside></x-layouts.aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Pendaftaran Tahap 2</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Casis</li>
                </ol>
            </nav> 
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Calon Siswa</h5>
                    <form action="{{ route('tahap_2') }}" method="GET" class="mb-1">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-4">
                                <label for="filterJurusan" class="form-label mb-1">Filter Jurusan:</label>
                                <select class="form-select" id="filterJurusan" name="jurusan_id"
                                    onchange="this.form.submit()">
                                    <option value="">Semua Jurusan</option>
                                    @foreach ($jurusan as $j)
                                        <option value="{{ $j->id }}"
                                            {{ isset($selectedJurusanId) && $selectedJurusanId == $j->id ? 'selected' : '' }}>
                                            {{ $j->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 offset-md-3"> {{-- Menggeser input search ke kanan --}}
                                <label for="search" class="form-label mb-1">Cari Pendaftar:</label>
                                <input type="text" class="form-control" name="search" class="search"
                                    placeholder="Cari NISN, Nama, Asal Sekolah..." value="{{ request('search') }}">
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('getForm_tahap_2') }}" class="btn btn-sm btn-primary mb-2">Tambah</a>

                    <div class="table-responsive">
                        <table class="table table-search table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
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
                                @forelse ($dataCasis as $casis)
                                    <tr>
                                        <td>{{ $no++ }}</td>
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
                                            <a href="{{ route('showData.tahap2', $casis->id) }}"
                                                class="btn btn-sm btn-warning"><i class="bi bi-info-circle"></i></a>
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
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script>
        $(document).ready(function() {
            $("body").on("change keyup keydown", ".search", function() {
                var search = $(this).val();
                var data = "search="+search;

                $.ajak({
                    method:POST,
                    url:{{ route('table.casis') }}
                    data:data,
                    success:function(result){
                        $(".table-search").html(result);
                    }
                })
            })
        });
    </script>
@endsection
