<!-- resources/views/dashboard.blade.php -->

@extends('layouts.master')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="row">
        <div class="container">
            <h2>Dashboard</h2>

            {{-- Detail Transaksi Sampah --}}
            <div class="card mt-4">
                <div class="card-header">Detail Transaksi Sampah</div>
                <div class="card-body">
                    <table class="table">
                        <!-- Tampilkan data transaksi di sini -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Sampah</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->User->name }}</td>
                                    <td>{{ $transaction->jumlahsampah->jumlah }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td>{{ $transaction->jumlahsampah->jenis_sampaho->harga }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Statistik Sampah Terbanyak per Kategori --}}
            <div class="card mt-4">
                <div class="card-header">Statistik Sampah Terbanyak per Kategori</div>
                <div class="card-body">
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
      // Ambil data dari PHP dan siapkan data untuk grafik
      var data = @json($data);
  
      // Proses data untuk mendapatkan label dan nilai
      var groupedData = {};
  
      data.forEach(function (item) {
          var key = item.sampah;
          if (!groupedData[key]) {
              groupedData[key] = {
                  sampah: key,
                  jumlah: 0
              };
          }
          groupedData[key].jumlah += item.jumlah;
      });
  
      var labels = Object.keys(groupedData);
      var values = Object.values(groupedData).map(function (item) {
          return item.jumlah;
      });
  
      // Gambar grafik menggunakan Chart.js
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: labels,
              datasets: [{
                  label: 'Total Sampah',
                  data: values,
                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  </script>
@endsection
