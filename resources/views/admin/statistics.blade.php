@extends('layouts.app')

@section('content')
    <h1 style="margin-bottom: 30px;" class="no-mobile">📊 Statistik Global</h1>

    <!-- Grid akan otomatis jadi 1 kolom di HP berkat class dari style.css -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
        <div class="card">
            <h3 style="font-size: 1rem;">Sebaran Tipe Belajar</h3>
            <div style="max-width: 300px; margin: 0 auto;">
                <canvas id="adminChart"></canvas>
            </div>
        </div>
        <div class="card" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; min-height: 200px;">
            <h2 style="font-size: 3.5rem; color: var(--primary); margin: 0;">{{ $allData->count() }}</h2>
            <p style="color: var(--text-muted); font-weight: 500;">Total Responden</p>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-bottom: 20px;">👥 Data Seluruh Pengguna</h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Nama</th>
                        <th>Hasil</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $row)
                    <tr>
                        <td><b>{{ $row->user->username }}</b></td>
                        <td>{{ $row->nama_lengkap }}</td>
                        <td><span class="badge badge-santai" style="font-size: 0.65rem;">{{ $row->hasil_label }}</span></td>
                        <td style="font-size: 0.8rem; color: var(--text-muted);">{{ $row->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('adminChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Santai', 'Aktif', 'Sangat Aktif'],
                datasets: [{
                    data: [{{ $chartData['santai'] }}, {{ $chartData['aktif'] }}, {{ $chartData['sangat_aktif'] }}],
                    backgroundColor: ['#55efc4', '#fab1a0', '#a29bfe'],
                    borderWidth: 0
                }]
            },
            options: { plugins: { legend: { position: 'bottom' } } }
        });
    </script>
@endsection