@extends('components.layouts.user')

@section('konten')
    <x-layouts.user.header></x-layouts.user.header>
    <x-layouts.user.aside></x-layouts.user.aside>

    <main id="main" class="main">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-lg-12">
                    <div class="col-xxl-12 col-xl-12 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Selamat datang {{ Session::get('name') }}! 🎉
                                        </h5>
                                        @if (!$user)
                                            <p class="mb-4">
                                                Pendaftaran pertama kamu sudah berhasil. Silahkan mendaftar ke tahap
                                                selanjutnya
                                            </p>
                                            <a href="{{ route('form.tahap_2') }}"
                                                class="btn btn-sm btn-outline-primary">Pendaftaran
                                                tahap 2</a>
                                        @elseif(!$cekAyah && !$cekIbu)
                                            <p class="mb-4">
                                                Pendataan orang tua kamu selesai. Silahkan mendaftar ke tahap terakhir
                                            </p>
                                            <a href="{{ route('data.ortu') }}" class="btn btn-sm btn-outline-primary">Upload
                                                Dokumen</a>
                                        @else
                                            <p class="mb-4">
                                                Pendaftaran berhasil. Silahkan tunggu pesan dari admin, pesan akan dikirim
                                                melalui nomor whatsapp yang didaftarkan
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="{{ asset('assets/img/man.png') }}" height="140" alt="View Badge User" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    @php
                        $progres_percentage = 20;
                        $progres_text = 'Belum Ada progres';

                        if (($user)) {
                            $progres_percentage = 43;
                            $progres_text = 'Pendaftaran tahap 2 selesai';

                            if ($cekAyah) {
                                $progres_percentage = 53;
                                $progres_text = 'Pendataan ayah selesai';

                                if ($cekIbu) {
                                    $progres_percentage = 61;
                                    $progres_text = 'Pendataan ibu selesai';

                                    if ($cekAyah && $cekIbu) {
                                        $progres_percentage = 79;
                                        $progres_text = 'Pendataan orang tua selesai';

                                        if ($exist) {
                                            $progres_percentage = 100;
                                            $progres_text = 'Upload dokumen berhasil. Tunggu kabar dari admin yaa';
                                        }
                                    }
                                }
                            }
                        }
                    @endphp
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($progres_percentage == 100)
                                    <i class="bi bi-check-square-fill text-success"></i>
                                @else
                                    <i class="bi bi-gear-fill text-primary"></i>
                                @endif
                                Progres Pendaftaran
                            </h5>
                            <p class="card-text">{{ $progres_text }}.</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progres_percentage }}%"
                                    aria-valuenow="56" aria-valuemin="{{ $progres_percentage }}" aria-valuemax="100"></div>
                            </div>
                            <span class="d-block mt-2 text-end">{{ $progres_percentage }}%</span>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-exclamation-circle-fill text-warning"></i>
                                Peringatan
                            </h5>
                            <p class="card-text">Jika ada data yang keliru mohon hubungi admin kami. Info kontak admin
                                disiini <span><a href=""><i class="bi bi-whatsapp"></i> 08934782997</a></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                Alur Pendaftaran Online
                            </h5>
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/alur.png') }}" alt="Alur Pendaftaran" class="img-fluid"
                                    width="350px">
                            </div>
                            <ol>
                                <li>
                                    <p>Daftarkan diri & buat akun</p>
                                </li>
                                <li>
                                    <p>Lanjut ke pendaftaran tahap 2</p>
                                </li>
                                <li>
                                    <p>Input data kedua orang tua</p>
                                </li>
                                <li>
                                    <p>Upload dokumen</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
