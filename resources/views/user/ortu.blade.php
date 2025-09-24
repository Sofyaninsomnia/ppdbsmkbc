@extends('components.layouts.user')

@section('konten')
    <x-layouts.user.header></x-layouts.user.header>
    <x-layouts.user.aside></x-layouts.user.aside>

    <main id="main" class="main">
         <div class="pagetitle">
            <h1>Pendataan orang tua</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pendataan orang tua</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-12">
            <div class="row">

                <div class="alert alert-danger text-center">Data orang tua belum lengkap</div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                Ayah Kandung
                            </h5>
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/2.png') }}" alt="Alur Pendaftaran" class="img-fluid"
                                    width="250px">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('data.ayah') }}" class="btn btn-primary">Lengkapi</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                Ibu Kandung
                            </h5>
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/1.png') }}" alt="Alur Pendaftaran" class="rounded-circle"
                                    width="250px">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="" class="btn btn-primary">Lengkapi</a>
                            </div>  
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
