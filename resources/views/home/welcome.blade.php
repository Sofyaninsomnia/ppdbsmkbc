@extends('components.layouts.home')

@section('konten_home')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background" style="min-height: 100vh; padding: 80px 0;">
            <img src="assets/img/school.jpg" alt="" class="hero-bg">

            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="assets/img/hero.png" width="1800px" height="auto" class="img-fluid animated" alt="">
                    </div>

                    <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
                        <h2>SMK Bina Cendekia Cirebon</h2>
                        <p style="text-align: justify;">Jadilah bagian dari SMK Bina Cendekia Cirebon, tempat di mana masa
                            depanmu dimulai dengan pendidikan berkualitas, keterampilan nyata, dan peluang karir yang tak
                            terbatas!.</p>
                        <div class="d-flex">
                            <button onclick="location.href='/daftar/registrasi'" class="btn-get-started">Daftar sekarang</button>
                        </div>
                    </div>

                </div>
            </div>

            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28 " preserveAspectRatio="none">
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

        </section><!-- /Hero Section -->

        <x-layouts.section.about></x-layouts.section.about>

        <section id="jurusan" class="team section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Keahlian</h2>
                <div><span>Hadir Dengan Pilihan Kompetensi
                    </span> <span class="description-title">Keahlian</span></div>
            </div>

            <div class="container">
                <div class="row gy-5">

                    @foreach ($infoJurusan->take(3) as $jurusan)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="member">
                                <div class="pic">
                                    <img src="{{ asset('storage/' . $jurusan->cover) }}" class="img-fluid" alt=""
                                        style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $jurusan->jurusan->nama_jurusan }}</h4>
                                    <span>{{ $jurusan->deskripsi_singkat }}</span>
                                    <p>
                                    <div class="d-flex">
                                        <a href="{{ route('home.show', $jurusan->id) }}" class="btn-get-started" style="color: #003366;">Lihat
                                            Selengkapnya >></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            @if ($infoJurusan->count() > 3)
                <div class="container" style="margin-top: 40px;">
                    <div class="row gy-5">

                        @foreach ($infoJurusan->skip(3) as $jurusan)
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="member">
                                    <div class="pic">
                                        <img src="{{ asset('storage/' . $jurusan->cover) }}" class="img-fluid"
                                            alt="" style="width: 100%; height: 500px; object-fit: cover;">
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ $jurusan->jurusan->nama_jurusan }}</h4>
                                        <span>{{ $jurusan->deskripsi_singkat }}</span>
                                        <p>
                                        <div class="d-flex">
                                            <a href="{{ route('home.show', $jurusan->id) }}" class="btn-get-started" style="color: #003366;">Lihat
                                                Selengkapnya >></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
        </section>

        <x-layouts.section.fasilitas></x-layouts.section.fasilitas>

        <section id="fasilitas" class="testimonials section dark-background">

            <img src="assets/img/school.jpg" class="testimonials-bg" alt="">

            <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <h1 class="text-center text-light display-3 fw-bold mb-4">
                        Wujudkan Impianmu Bersama <br>
                        <span class="text-light">SMK BINA CENDEKIA CIREBON</span>
                    </h1>

                    <div class="text-center mb-5">
                        <i>
                            <h7 class="lead text-white fw-bold" style="font-family: 'Roboto', sans-serif;">
                                SMK Bina Cendekia Cirebon menjadi wahana bertumbuh untuk mempersiapkan diri
                                <br>melanjutkan perjalanan menuntut ilmu di Perguruan Tinggi Negeri.
                            </h7>
                        </i>
                    </div>

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="center">
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <img src="assets/img/bahan1.png" width="40%" height="auto" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="carousel-item active">
                                    <img src="assets/img/bahan2.png" width="40%" height="auto" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/bahan3.png" width="40%" height="auto" class="img-fluid"
                                        alt="">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <style>
                        .center {
                            text-align: center;
                        }
                    </style>

                    <div class="container mt-3">
                        <div class="row gy-5">


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fasilita" class="details section">
            <div class="container">
                <div class="row gy-4 align-items-center features-item">
                    <div class="col-md-5 d-flex align-items-center aos-init aos-animate" data-aos="zoom-out"
                        data-aos-delay="100">
                        <img src="assets/img/hero.png" width="500px" height="auto" class=" animated"
                            alt="">
                    </div>
                    <div class="col-md-7 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <h3>Alasan mengapa Anda harus mempertimbangkan untuk masuk ke SMK Bina Cendekia Cirebon:</h3>
                        <p>
                        </p>
                        <ul>
                            <li
                                style="display: flex; align-items: center; margin: 10px 0; padding: 10px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <i class="bi bi-check"></i><span> Menggunakan kurikulum yang relevan dengan kebutuhan
                                    industri dan perkembangan teknologi.</span>
                            </li>
                            <li
                                style="display: flex; align-items: center; margin: 10px 0; padding: 10px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <i class="bi bi-check"></i> <span> Guru yang berpengalaman di bidangnya.</span>
                            </li>
                            <li
                                style="display: flex; align-items: center; margin: 10px 0; padding: 10px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <i class="bi bi-check"></i> <span> Dilengkapi dengan ruang kelas yang nyaman dan
                                    laboratorium modern.</span>
                            </li>
                            <li
                                style="display: flex; align-items: center; margin: 10px 0; padding: 10px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <i class="bi bi-check"></i><span> Memiliki kerjasama dengan perusahaan untuk pengalaman
                                    kerja nyata.</span>
                            </li>
                            <li
                                style="display: flex; align-items: center; margin: 10px 0; padding: 10px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <i class="bi bi-check"></i> <span> Menyediakan berbagai jurusan yang siap memasuki dunia
                                    kerja.</span>
                            </li>
                            <li
                                style="display: flex; align-items: center; margin: 10px 0; padding: 10px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <i class="bi bi-check"></i> <span> Fokus pada pengembangan keterampilan interpersonal dan
                                    profesional.</span>
                            </li>
                            <li
                                style="display: flex; align-items: center; margin: 10px 0; padding: 10px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <i class="bi bi-check"></i> <span> Memiliki akreditasi yang menunjukkan kualitas pendidikan
                                    yang tinggi.</span>
                            </li>
                            <li
                                style="display: flex; align-items: center; margin: 10px 0; padding: 10px; background-color: #fff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <i class="bi bi-check"></i><span> Beragam kegiatan ekstrakurikuler yang mendukung
                                    pengembangan minat dan bakat.</span>
                            </li>
                        </ul>

                    </div>
                </div><!-- End Features Item -->



            </div>

        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <div><span>Check Our</span> <span class="description-title">Contact</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Alamat</h3>
                                <p>Mertapada wetan jl kh wahid hasyim</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Telepon</h3>
                                <p>0896 0286 7121</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email</h3>
                                <p>smkbinacendekia@gmail.com</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Kirim pesan</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>
@endsection
