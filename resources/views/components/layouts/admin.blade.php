<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin PPDB SMK BECE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('assets/img/bc.png') }}" rel="icon">
    <link href="{{ asset('assets/img/bc.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ asset('assets/adm/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/adm/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/adm/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/adm/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/adm/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/adm/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/adm/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <link href="{{ asset('assets/adm/css/style.css') }}" rel="stylesheet">
    <style>
        .star {
  font-size: 2rem;
  color: #ccc;
  cursor: pointer;
}

.star.hover,
.star.selected {
  color: gold;
}

    </style>
    </head>
<body>

    @yield('konten')
        <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1500,
                showConfirmButton: false
            })
        @endif
    </script>

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>PPDBSMK BECE</span></strong>. All Rights Reserved
            <p class="timestamp">WAKTU AKSES: <span id="current-time"></span></p>
        </div>
    </footer><a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script>
        function updateTime() {
            const now = new Date();
            const options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID', options);
        }
        setInterval(updateTime, 1000);
        updateTime(); // Initial call
      </script>
    <script src="{{ asset('assets/adm/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/adm/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/adm/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/adm/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/adm/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/adm/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/adm/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/adm/vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('assets/adm/js/main.js') }}"></script>
</body>

</html>