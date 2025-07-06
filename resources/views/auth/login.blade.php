<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PPDBSMK BC</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link href="{{ asset('assets/img/bc.png') }}" rel="icon">
    <link href="{{ asset('assets/img/bc.png') }}" rel="apple-touch-icon">
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
        @if ($errors->any())
            <div>
                <strong>Whoops! Ada beberapa masalah dengan input Anda.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('proses_login') }}" method="POST" class="form">
            @csrf

            <div class="container">
                <input required type="text" name="email" value="{{ old('email') }}" class="input" autocomplete="off">
                <label class="label">Email</label>
            </div>
            <div class="container">
                <input required type="password" name="password" class="input" autocomplete="off">
                <label class="label">Password</label>
            </div>

            <!-- tombol wrapper -->
            <div class="btn-group">
                <button type="submit" class="btn btn-login">Login</button>
                <button type="button" class="btn btn-register" onclick="location.href='/register'">
                    Register
                </button>
            </div>
        </form>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('loader');
            const formContainer = document.querySelector('.form-container');

            // Sembunyikan form container secara default
            if (formContainer) {
                formContainer.style.display = 'none';
            }

            // Setelah 2 detik, sembunyikan loader dan tampilkan form container
            setTimeout(function() {
                loader.style.display = 'none';
                if (formContainer) {
                    formContainer.style.display =
                        'flex'; // Atau 'block' tergantung tata letak yang diinginkan
                }
            }, 2000);
        });

        function updateTime() {
            const now = new Date();
            const options = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID', options);
        }
        setInterval(updateTime, 1000);
        updateTime(); // Initial call
    </script>
</body>

</html>
