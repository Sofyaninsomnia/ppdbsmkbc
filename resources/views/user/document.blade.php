@extends('components.layouts.user')

@section('konten')
    <x-layouts.user.header></x-layouts.user.header>
    <x-layouts.user.aside></x-layouts.user.aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Uploads Document</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Uploads Document</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-12">
            <div class="row">

                

            </div>
        </div>
    </main>
@endsection
