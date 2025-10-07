<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PPDBSMK BC</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link href="{{ asset('assets/img/bc.png') }}" rel="icon">
    <link href="{{ asset('assets/img/bc.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css">
    <style>
        body {
            font-family: monospace, sans-serif;
            margin: 0;
            background-color: #212121;
            color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: auto;
        }
    </style>

</head>

<body>
    <div id="loader">
        <div class="loader">
            <div data-glitch="Loading..." class="glitch">Loading...</div>
        </div>
    </div>
    <div class="form-container">
        <h1>Login ke PPDB SMK BC</h1>
        <form action="{{ route('privat.login.post') }}" method="POST" class="form">
            @csrf

            <div class="container">
                <input required type="text" name="email" value="{{ old('email') }}" class="input"
                    autocomplete="off">
                <label class="label">Email</label>
            </div>
            <div class="container">
                <input required type="password" name="password" class="input" autocomplete="off">
                <label class="label">Password</label>
            </div>

            <!-- tombol wrapper -->
            <div class="btn-group">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
        </form>
    </div>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: true,
                confirmButtonText: 'OK',
            });
        @endif
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('loader');
            const formContainer = document.querySelector('.form-container');

            if (formContainer) {
                formContainer.style.display = 'none';
            }

            setTimeout(function() {
                if (loader) {
                    loader.style.display = 'none';
                }
                if (formContainer) {
                    formContainer.style.display = 'flex';
                }
            }, 2000); 

            function updateTime() {
                const now = new Date();
                const options = {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                };
                const timeElement = document.getElementById('current-time');

                if (timeElement) {
                    timeElement.textContent = now.toLocaleTimeString('id-ID', options);
                }
            }

            setInterval(updateTime, 1000);

            updateTime();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
