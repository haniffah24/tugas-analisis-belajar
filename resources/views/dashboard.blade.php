@extends('layouts.app')

@section('content')
    <!-- Perubahan: Menambahkan class header-section untuk kontrol CSS responsif -->
    <div class="header-section" style="display:flex; justify-content: space-between; align-items:center; margin-bottom:40px; background: white; padding: 30px; border-radius: 20px; box-shadow: var(--shadow);">
        <div>
            <h1 style="margin:0; font-weight:600; color:var(--primary);">Pusat Analisis Belajar</h1>
            <p style="color: var(--text-muted); margin:5px 0 0 0;">Pantau progres dan rekomendasi belajar pribadimu.</p>
        </div>
        <!-- Tombol Klasifikasi yang Lebih Bagus -->
        <a href="{{ route('input.data') }}" class="btn-primary" style="padding: 15px 30px; border-radius: 50px;">
            <span style="font-size: 1.2rem;">✨</span> Mulai Klasifikasi Baru
        </a>
    </div>

    <div class="card">
        <h3 style="margin-bottom: 25px;">📅 Riwayat Perhitungan Kamu</h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Tgl Input</th>
                        <th>Jam Belajar</th>
                        <th>Status AI</th>
                        <th>Hasil Klasifikasi</th>
                        <th>Rekomendasi Ahli</th>
                        <th style="text-align: center;">Cetak</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($history as $data)
                    <tr>
                        <td style="font-weight: 600;">{{ $data->created_at->format('d M Y') }}</td>
                        <td>{{ $data->jam_belajar }} Jam</td>
                        <td>{!! $data->pakai_ai ? '<span style="color:var(--secondary);">✔ Aktif</span>' : '<span style="color:var(--accent);">✘ Non-aktif</span>' !!}</td>
                        <td>
                            <span class="badge {{ $data->hasil_label == 'Mahasiswa Belajar Santai' ? 'badge-santai' : ($data->hasil_label == 'Mahasiswa Aktif Belajar' ? 'badge-aktif' : 'badge-sangat-aktif') }}">
                                {{ $data->hasil_label }}
                            </span>
                        </td>
                        <!-- Tooltip/Scrollable Text untuk Rekomendasi di Mobile -->
                        <td style="font-size: 0.85rem; min-width: 200px; max-width: 250px; color: var(--text-muted);">
                            <i>"{{ $data->saran_rekomendasi }}"</i>
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('print.result', $data->id) }}" target="_blank" class="btn-primary" style="background:#f1f2f6; color:var(--text-dark); padding: 8px 15px; font-size: 0.8rem;">🖨 Print</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; padding: 50px; color: var(--text-muted);">Belum ada data. Silakan klik tombol klasifikasi di atas!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection