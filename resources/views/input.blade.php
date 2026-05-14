@extends('layouts.app')

@section('content')
<!-- Menambahkan container-fluid atau pembungkus yang lebih fleksibel -->
<div style="max-width: 800px; margin: 0 auto;">
    <div class="card">
        <h3><span style="color: var(--primary);">➕</span> Input Data Klasifikasi Belajar</h3>
        <p style="color: var(--text-muted); margin-bottom: 25px;">Masukkan data kamu untuk melihat hasil analisis berdasarkan Decision Tree.</p>

        @if(session('success'))
            <div style="background: var(--secondary); color: white; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('hitung.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama..." required>
            </div>

            <!-- Grid ini akan otomatis menumpuk di HP berkat CSS @media yang kita buat -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;" class="form-row-mobile">
                <div class="form-group">
                    <label>Angkatan</label>
                    <input type="text" name="angkatan" class="form-control" placeholder="Masukkan angkatan..." required>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <input type="number" name="semester" class="form-control" placeholder="Masukkan semester..." required>
                </div>
            </div>

            <div class="form-group">
                <label>Berapa lama kamu belajar dalam sehari? (Jam)</label>
                <input type="number" step="0.1" name="jam_belajar" class="form-control" placeholder="Masukkan jam belajar..." required>
                <small style="color: var(--text-muted)">Gunakan titik (.) untuk desimal.</small>
            </div>

            <div class="form-group">
                <label>Apakah kamu menggunakan bantuan AI?</label>
                <select name="pakai_ai" class="form-control" required>
                    <option value="">-- Pilih Jawaban --</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <!-- Tombol yang adaptif -->
            <div style="margin-top: 30px; display: flex; gap: 10px;" class="form-actions-mobile">
                <button type="submit" class="btn-primary" style="flex: 2;">Hitung Hasil Klasifikasi</button>
                <a href="{{ route('dashboard') }}" style="text-decoration:none; padding: 12px 20px; color: var(--text-muted); flex: 1; text-align: center;">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection