@extends('layout')

@section('title', 'Dashboard Utama')

@section('content')

    <div class="metric-cards">
        <div class="metric-card" style="border-bottom: 4px solid #3498db;">
            <p class="title">Total Destinasi</p>
            <p class="value">12</p>
        </div>

        <div class="metric-card" style="border-bottom: 4px solid #2ecc71;">
            <p class="title">Pengguna Aktif</p>
            <p class="value">245</p>
        </div>

        <div class="metric-card" style="border-bottom: 4px solid #f39c12;">
            <p class="title">Transaksi Bulan Ini</p>
            <p class="value">67</p>
        </div>
        
        <div class="metric-card" style="border-bottom: 4px solid #e74c3c;">
            <p class="title">Estimasi Pendapatan</p>
            <p class="value">Rp 12.5M</p>
        </div>
    </div>
    
    <div class="dashboard-grid">
        
        <div class="panel">
            <h3 class="panel-title">Tinjauan Penjualan Tiket (6 Bulan Terakhir)</h3>
            <canvas id="salesChart" style="max-height: 350px;"></canvas>
        </div>
        
        <div class="panel">
            <h3 class="panel-title">Aktivitas Terbaru</h3>
            <ul class="activity-list" style="padding-left: 0;">
                <li>Transaksi baru dari **Siti** <span class="time">5 menit lalu</span></li>
                <li>Wisata **Bromo** diupdate <span class="time">1 jam lalu</span></li>
                <li>User baru **Rudi** terdaftar <span class="time">3 jam lalu</span></li>
                <li>Laporan Q4 dibuat <span class="time">Kemarin</span></li>
            </ul>
        </div>
    </div>
    
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('salesChart').getContext('2d');
    
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov'],
            datasets: [{
                label: 'Jumlah Transaksi',
                data: [35, 42, 58, 67, 85, 92],
                backgroundColor: 'rgba(52, 152, 219, 0.8)',
                borderColor: 'rgba(52, 152, 219, 1)',
                borderWidth: 1
            },
            {
                label: 'Rata-rata Pendapatan (juta)',
                data: [4.5, 5.1, 6.2, 7.5, 9.0, 10.5],
                type: 'line',
                borderColor: 'rgba(46, 204, 113, 1)',
                backgroundColor: 'transparent',
                borderWidth: 2,
                yAxisID: 'y1'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true, title: { display: true, text: 'Jumlah Transaksi' } },
                y1: { 
                    type: 'linear', display: true, position: 'right', 
                    grid: { drawOnChartArea: false }, 
                    title: { display: true, text: 'Pendapatan (Juta)' }
                }
            }
        }
    });
});
</script>
@endpush