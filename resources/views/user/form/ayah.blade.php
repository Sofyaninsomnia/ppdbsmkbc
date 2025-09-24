@extends('components.layouts.user')

@section('konten')
    <x-layouts.user.header></x-layouts.user.header>

    <x-layouts.user.aside></x-layouts.user.aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data ayah kandung</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('data.ortu') }}">Pendataan orang tua</a></li>
                    <li class="breadcrumb-item active">Data ayah kandung</li>
                </ol>
            </nav>
        </div>
        <section class="section profile">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
