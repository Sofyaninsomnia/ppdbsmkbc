<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MASUK. SEKARANG.</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    font-family: monospace, sans-serif;
    margin: 0;
    background-color: #212121; /* Background gelap */
    color: #f0f0f0; /* Teks terang agar kontras dengan background */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow: auto; /* Ganti hidden menjadi auto agar konten bisa di-scroll jika perlu di layar kecil */
}

button,
button::after {
    padding: 10px 50px;
    font-size: 20px;
    border: none;
    border-radius: 5px;
    color: white;
    background-color: transparent;
    position: relative;
    cursor: pointer; /* Tambahkan cursor agar terlihat interaktif */
}

button::after {
    --move1: inset(50% 50% 50% 50%);
    --move2: inset(31% 0 40% 0);
    --move3: inset(39% 0 15% 0);
    --move4: inset(45% 0 40% 0);
    --move5: inset(45% 0 6% 0);
    --move6: inset(14% 0 61% 0);
    clip-path: var(--move1);
    content: 'LOGIN';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: block;
}

button:hover::after {
    animation: login_4011 1s;
    text-shadow: 10 10px 10px black;
    animation-timing-function: steps(2, end);
    text-shadow: -3px -3px 0px #1df2f0, 3px 3px 0px #E94BE8;
    background-color: transparent;
    border: 3px solid rgb(0, 255, 213);
}

button:hover {
    text-shadow: -1px -1px 0px #1df2f0, 1px 1px 0px #E94BE8;
    background-color: transparent;
    border: 1px solid rgb(0, 255, 213);
    box-shadow: 0px 10px 10px -10px rgb(0, 255, 213);
}

@keyframes login_4011 {
    0% {
        clip-path: var(--move1);
        transform: translate(0px, -10px);
    }

    10% {
        clip-path: var(--move2);
        transform: translate(-10px, 10px);
    }

    20% {
        clip-path: var(--move3);
        transform: translate(10px, 0px);
    }

    30% {
        clip-path: var(--move4);
        transform: translate(-10px, 10px);
    }

    40% {
        clip-path: var(--move5);
        transform: translate(10px, -10px);
    }

    50% {
        clip-path: var(--move6);
        transform: translate(-10px, 10px);
    }

    60% {
        clip-path: var(--move1);
        transform: translate(10px, -10px);
    }

    70% {
        clip-path: var(--move3);
        transform: translate(-10px, 10px);
    }

    80% {
        clip-path: var(--move2);
        transform: translate(10px, -10px);
    }

    90% {
        clip-path: var(--move4);
        transform: translate(-10px, 10px);
    }

    100% {
        clip-path: var(--move1);
        transform: translate(0);
    }
}


a,
a::after {
    padding: 10px 50px;
    font-size: 20px;
    border: none;
    border-radius: 5px;
    color: white;
    background-color: transparent;
    position: relative;
    cursor: pointer; /* Tambahkan cursor agar terlihat interaktif */
}

a::after {
    --move1: inset(50% 50% 50% 50%);
    --move2: inset(31% 0 40% 0);
    --move3: inset(39% 0 15% 0);
    --move4: inset(45% 0 40% 0);
    --move5: inset(45% 0 6% 0);
    --move6: inset(14% 0 61% 0);
    clip-path: var(--move1);
    content: 'REGISTER';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: block;
}

a:hover::after {
    animation: register_4011 1s;
    text-shadow: 10 10px 10px black;
    animation-timing-function: steps(2, end);
    text-shadow: -3px -3px 0px #1df2f0, 3px 3px 0px #E94BE8;
    background-color: transparent;
    border: 3px solid rgb(0, 255, 213);
}

a:hover {
    text-shadow: -1px -1px 0px #1df2f0, 1px 1px 0px #E94BE8;
    background-color: transparent;
    border: 1px solid rgb(0, 255, 213);
    box-shadow: 0px 10px 10px -10px rgb(0, 255, 213);
}

@keyframes register_4011 {
    0% {
        clip-path: var(--move1);
        transform: translate(0px, -10px);
    }

    10% {
        clip-path: var(--move2);
        transform: translate(-10px, 10px);
    }

    20% {
        clip-path: var(--move3);
        transform: translate(10px, 0px);
    }

    30% {
        clip-path: var(--move4);
        transform: translate(-10px, 10px);
    }

    40% {
        clip-path: var(--move5);
        transform: translate(10px, -10px);
    }

    50% {
        clip-path: var(--move6);
        transform: translate(-10px, 10px);
    }

    60% {
        clip-path: var(--move1);
        transform: translate(10px, -10px);
    }

    70% {
        clip-path: var(--move3);
        transform: translate(-10px, 10px);
    }

    80% {
        clip-path: var(--move2);
        transform: translate(10px, -10px);
    }

    90% {
        clip-path: var(--move4);
        transform: translate(-10px, 10px);
    }

    100% {
        clip-path: var(--move1);
        transform: translate(0);
    }
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
    <form action="/admin" class="form">
        <div class="container">
            <input required="" type="text" name="text" class="input">
            <label class="label">Username</label>
          </div>
          <div class="container">
            <input required="" type="text" name="text" class="input">
            <label class="label">Password</label>
          </div>
      <button type="submit">Login</button>
      <a href="">register</a>
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
            formContainer.style.display = 'flex'; // Atau 'block' tergantung tata letak yang diinginkan
        }
    }, 2000);
});

function updateTime() {
    const now = new Date();
    const options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
    document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID', options);
}
setInterval(updateTime, 1000);
updateTime(); // Initial call
    </script>
</body>
</html>