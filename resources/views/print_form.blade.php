<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-center print-button-area">Bukti Pendaftaran</title>
    <link rel="stylesheet" href="{{ asset('assets/voler/css/bootstrap.css')}}">
    <link rel="shortcut icon" href="{{ asset('assets/img/bc.png')}}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .print-container {
            width: 80%;
            max-width: 700px;
            margin: 40px auto;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #343a40;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .data-item {
            display: flex;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px dashed #e9ecef;
        }
        .data-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .data-label {
            font-weight: bold;
            width: 180px;
            color: #495057;
        }
        .data-value {
            flex: 1;
            color: #212529;
        }
        .print-button-area {
            text-align: center;
            margin-top: 40px;
        }
        .btn-print {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
            padding: 10px 25px;
            font-size: 1.1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-print:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-back {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
            padding: 10px 25px;
            font-size: 1.1em;
            border-radius: 5px;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                background-color: #fff;
            }
            .print-container {
                width: 100%;
                margin: 0;
                border: none;
                box-shadow: none;
                padding: 20px;
            }
            .print-button-area {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="print-container">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/img/bc.png')}}" height="60" class="mb-3">
            <h2>Data Pendaftaran Siswa Baru</h2>
            <p>SMK BINA CENDEKIA CIREBON</p>
        </div>
        <hr>

        <div class="data-item">
            <span class="data-label">NISN:</span>
            <span class="data-value">{{ $pendaftaran->nisn }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Nama Lengkap:</span>
            <span class="data-value">{{ $pendaftaran->nama_lengkap }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Asal Sekolah:</span>
            <span class="data-value">{{ $pendaftaran->asal_sekolah }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Jenis Kelamin:</span>
            <span class="data-value">{{ ucfirst($pendaftaran->jenis_kelamin) }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Jurusan:</span>
            <span class="data-value">{{ $pendaftaran->jurusan->nama_jurusan }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">No. WhatsApp:</span>
            <span class="data-value">{{ $pendaftaran->no_hp }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Tanggal Daftar:</span>
            <span class="data-value">{{ \Carbon\Carbon::parse($pendaftaran->created_at)->format('d F Y H:i') }}</span>
        </div>
        

        <div class="print-button-area">
            <button onclick="window.print()" class="btn btn-primary btn-print">Cetak Sekarang</button>
            <a href="{{ route('daftar.registrasi') }}" class="btn btn-secondary btn-back">Kembali ke Form Pendaftaran</a>
        </div>
    </div>

    <script src="{{ asset('assets/voler/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('assets/voler/js/app.js')}}"></script>
    <script src="{{ asset('assets/voler/js/main.js')}}"></script>
    <script>
        feather.replace();
    </script>
</body>
</html>