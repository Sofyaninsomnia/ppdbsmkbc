@extends('components.layouts.admin')

@section('konten')
<x-layouts.header></x-layouts.header>

 <x-layouts.aside></x-layouts.aside>

 <main id="main" class="main">

  <div class="pagetitle">
   <h1>Dashboard</h1>
  </div>

  <div class="row">
   <div class="col-lg-6">
    <div class="card">
     <div class="card-body">
      <h5 class="card-title">Data casis per bulan</h5>
      <canvas id="myChart"></canvas>
     </div>
    </div>
   </div>
  </div>

 </main>

  <script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'bar', // Anda bisa mengganti jenis chart sesuai kebutuhan (line, pie, dll.)
    data: {
      labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
      datasets: [{
        label: 'Daftar casis',
        data: [12, 19, 3, 5, 2, 3],
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