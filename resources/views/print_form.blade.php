<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-center print-button-area">PPDB SMK BECE</title>
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
            position: relative;
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

        .signature-area {
            display: flex;
            justify-content: space-between;
            margin-top: 60px;
            padding: 0 20px;
        }

        .signature-box {
            text-align: center;
            width: 45%;
        }

        .signature-line {
            border-bottom: 1px #000;
            margin-top: 70px;
            margin-bottom: 5px;
        }

        .signature-label {
            font-size: 0.9em;
            color: #554;
        }

        .pas-foto-area {
            position: absolute;
            top: 85px;
            right: 40px;
            width: 100px;
            height: 120px;
            border: 1px dashed #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #f0f0f0;
            color: #999;
            font-size: 0.8em;
            text-align: center; 
        }

        .pas-foto-area img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

       @media print {
            body {
                margin: 0;
                padding: 0;
                background-color: #fff;
                size: A4 portrait;
            }
            .print-container {
                width: 100%;
                margin: 0;
                border: none;
                box-shadow: none;
                padding: 20px;
                max-width: initial;
            }
            .print-button-area {
                display: none;
            }
            @page {
                margin: 0;
                size: A4 portrait;
            }
            body::before, body::after {
                content: none !important; 
            }
            header, footer, #header, #footer {
                display: none !important;
            }
            a[href]:after {
                content: "";
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

        <div class="pas-foto-area">
            @if (isset($pendaftaran->pas_foto) && $pendaftaran->pas_foto)
            <img src="{{ asset('storage/' . $pendaftaran->pas_foto) }}" alt="pas foto">
            @else
                Pas foto 3x4
            @endif
        </div>

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
            <span class="data-value">{{ \Carbon\Carbon::parse($pendaftaran->created_at)->format('d F Y ') }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Kode Aktivasi:</span>
            <span class="data-value">{{ $pendaftaran->kode_aktivasi }}</span>
        </div>
        
        <div class="signature-area">
            <div class="signature-box">
                <p>Calon siswa</p>
                <div class="signature-line"></div>
                <p class="signature-label">( {{ $pendaftaran->nama_lengkap }} )</p>
            </div>
            <div class="signature-box">
                <p>Admin PPDB</p>
                <div class="signature-line"></div>
                <p class="signature-label">( Pengurus PPDB )</p>
            </div>
        </div>

        <div class="print-button-area">
            <button onclick="window.print()" class="btn btn-primary btn-print">Cetak Sekarang</button>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-back">Buat akun </a>
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