<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; text-align: center; padding: 20px; background: #f1f2f6; }
        .border { 
            border: 8px solid #6c5ce7; padding: 30px; border-radius: 20px; 
            background: white; max-width: 700px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .label { font-size: 1.8rem; color: #6c5ce7; margin: 20px 0; font-weight: 600; line-height: 1.2; }
        .name { font-size: 1.3rem; text-decoration: underline; font-weight: 600; }
        .tips-box { background: #f9f9f9; padding: 20px; border-radius: 10px; margin-top: 30px; text-align: left; font-style: italic; }
        .btn-print { 
            background: #6c5ce7; color: white; border: none; padding: 15px 30px; 
            border-radius: 10px; cursor: pointer; margin-top: 30px; font-weight: 600;
        }
        @media print { .no-print { display: none; } body { background: white; padding: 0; } .border { box-shadow: none; border-width: 15px; } }
        @media (max-width: 480px) { .label { font-size: 1.4rem; } .border { padding: 20px; } }
    </style>
</head>
<body>
    <div class="border">
        <h2 style="color: #2d3436;">HASIL ANALISIS BELAJAR</h2>
        <p style="color: #636e72;">Diberikan kepada:</p>
        <div class="name">{{ $data->nama_lengkap }}</div>
        <p>Berdasarkan aktivitas harian, kamu termasuk dalam kategori:</p>
        <div class="label">{{ $data->hasil_label }}</div>
        <div class="tips-box">
            <b>Rekomendasi Ahli:</b><br>
            "{{ $data->saran_rekomendasi }}"
        </div>
        <p style="margin-top: 40px; font-size: 0.7rem; color: #b2bec3;">Dicetak secara otomatis pada {{ date('d M Y') }}</p>
    </div>
    <button class="no-print btn-print" onclick="window.print()">🖨 Cetak Dokumen</button>
    <p class="no-print"><a href="/dashboard" style="color: #636e72; text-decoration:none; font-size:0.9rem;">Kembali ke Dashboard</a></p>
</body>
</html>