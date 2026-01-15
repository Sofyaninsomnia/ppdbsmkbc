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
            @livewire('casis-index')
        </section>

    </main>
@endsection
