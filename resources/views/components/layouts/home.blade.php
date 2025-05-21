
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PPDB SMK BECE</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/bc.png" rel="icon">
  <link href="assets/img/bc.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{  asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{  asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{  asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{  asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{  asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{  asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{  asset('assets/img/bc.png')}}" alt="Logo" style="max-height: 50px; margin-right: 10px;">
        
        <h1 class="sitename">SMK BINA CENDEKIA</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#profil">Profil</a></li>
          <li><a href="#jurusan">Jurusan</a></li>
          <li><a href="#fasilitas">Fasilitas</a></li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="{{ route('auth') }}">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  @yield('konten_home')

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">PPDB SMK BINA CENDEKIA</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Mertapada wetan jl kh wahid hasyim</p>
            <p class="mt-3"><strong>Hubungi:</strong> <span>0896 0286 7121</span></p>
            <p><strong>Email:</strong> <span>smkbinacendekia@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-youtube"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Tautan</h4>
          <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Jurusan</a></li>
            <li><a href="#">Fasilitas</a></li>
            <li><a href="#">Kontak</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Jurusan kami</h4>
          <ul>
            <li><a href="#">Rekayasa Perangkat Lunak</a></li>
            <li><a href="#">Teknik Bodi Otomotif</a></li>
            <li><a href="#">Samsung Institute Technology</a></li>
            <li><a href="#">Desain Busana Butik</a></li>
            <li><a href="#">Desain Komunikasi Visual</a></li>
            <li><a href="#">Layanan Kesehatan</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Dukung kami</h4>
          <p>Ingin menggapai cita-cita? yuk gabung dengan kami dengan daftarkan dirimu disini!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Permintaan kamu sudah terkirim, terima kasih sudah bergabung</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">SMK BINA CENDEKIA  <span id="tahun"></span></strong> <span>All Rights Reserved  </span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  <script>
  document.getElementById("tahun").textContent = new Date().getFullYear();
</script>

  <!-- Vendor JS Files -->
  <script src="{{  asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{  asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{  asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{  asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{  asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{  asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{  asset('assets/js/main.js')}}"></script>
</body>

</html>