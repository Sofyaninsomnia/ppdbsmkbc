@extends('components.layouts.home')

@section('konten_home')
    <main class="main">
        <section id="hero" class="hero section dark-background" style="min-height: 100vh; padding: 80px 0;">
            <img src="{{ asset('assets/img/school.jpg') }}" alt="" class="hero-bg">

            <div class="container">
                <div class="row gy-8 justify-content-between">
                    <div class="col-lg-5 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="assets/img/p1.png" width="600px" height="auto" class=" animated" alt="">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">
                        <h2>{{ $infoJurusan->jurusan->nama_jurusan }}</h2>
                        <p style="text-align: justify;">{{ $infoJurusan->deskripsi_singkat }}
                    </div>
                    <div class="d-flex">
                        <button onclick="location.href='/home'" class="btn-get-started">Kembali</button>
                    </div>
                </div>
            </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                    </path>
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                </g>
            </svg>
        </section>


        <section id="details" class="details section">
            <div class="container">
                <div class="row gy-4 align-items-center">
                    <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('storage/' . $infoJurusan->logo) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                        <h1>{{ $infoJurusan->jurusan->nama_jurusan }} SMK Bina Cendekia Cirebon</h1>
                        <p style="text-align: justify;">{{ $infoJurusan->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="gallery" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Mengenai</h2>
                <div><span>Rekayasa Perangkat Lunak</span> <span class="description-title">di SMK Bina Cendekia
                        Cirebon</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas RPL
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas RPL
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas RPL
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas RPL
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas RPL
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/lk.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/lk.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas LK
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/tbo.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/tbo.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas TBO
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/tabus.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/tabus.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas Tabus
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/sti.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/sti.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas STI
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/perpus.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/perpus.jpeg') }}" class="img-fluid"
                                    alt="" style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas Perpustakaan
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/toilet.jpg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/toilet.jpg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas Toilet
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('assets/img/gallery/rpl.jpeg') }}" class="img-fluid" alt=""
                                    style="width: 110%; height: 240px; object-fit: cover;">
                            </a>
                            <div class="caption"
                                style="text-align: center; padding: 5px; background-color: rgba(0, 0, 0, 0.5); color: white; font-size: 12px;">
                                Fasilitas RPL
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->

                </div>

            </div>

        </section>

    </main>
@endsection
