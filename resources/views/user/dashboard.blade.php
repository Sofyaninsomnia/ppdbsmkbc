@extends('components.layouts.user')

@section('konten')
    <x-layouts.user.header></x-layouts.user.header>

    <x-layouts.user.aside></x-layouts.user.aside>

    <main id="main" class="main">

        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-xl-12 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Selamat datang {{ Session::get('name') }}! 🎉</h5>
                                    <p class="mb-4">
                                        Pendaftaran pertama kamu sudah berhasil. Silahkan mendaftar ke tahap selanjutnya
                                    </p>

                                    <a href="" class="btn btn-sm btn-outline-primary">Pendaftaran tahap 2</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="{{ asset('assets/img/man.png') }}" height="140"
                                        alt="View Badge User" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </main>
@endsection
