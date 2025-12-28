@extends('components.layouts.admin')

@section('konten')
    <x-layouts.header></x-layouts.header>

    <x-layouts.aside></x-layouts.aside>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div>

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Semua</a></li>
                                        <li><a class="dropdown-item" href="#">Hari Ini</a></li>
                                        <li><a class="dropdown-item" href="#">Minggu Ini</a></li>
                                        <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Calon Siswa <span>| Semua</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>40</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-3">
                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Belum diproses
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>6</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-3">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Sudah diproses
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>61</h6>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Kuota Jurusan yang tersedia</h3>
                            <div class="d-flex justify-content-between align-items-center">
                                @forelse ($jurusan as $jurusan)
                                    @if ($jurusan->info)
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <img src="{{ asset('storage/' . $jurusan->info->logo) }}"
                                                style="border-radius: 50%" width="72px" class="mb-2" alt="">
                                            <h6 class="fw-bold">{{ $jurusan->kuota }}</h6>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <span class="text-danger mb-2">Logo Tidak Tersedia</span>
                                            {{-- <h6 class="fw-bold">{{ $jurusan->kuota }}</h6> --}}
                                        </div>
                                    @endif
                                @empty
                                    <h3>Empty cuuyy</h3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data casis per minggu terakhir</h5>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                datasets: [{
                    label: 'Daftar casis',
                    data: [12, 19, 3, 5, 2, 3, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                animation: {
                    duration: 1000, // Durasi animasi dalam milidetik
                    easing: 'easeOutQuad' // Jenis easing animasi (lihat dokumentasi Chart.js untuk opsi lain)
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
