<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyResult;
use Illuminate\Support\Facades\Auth;

class StudyResultController extends Controller
{
    public function index()
    {
        // User hanya melihat data miliknya sendiri di dashboard pribadi
        // Data seluruh pengguna dipindahkan ke halaman AdminController agar Dashboard user bersih
        $history = StudyResult::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('history'));
    }

    public function store(Request $request)
    {
        $jam = $request->jam_belajar;
        $ai = $request->pakai_ai;

        // IMPLEMENTASI LOGIKA DECISION TREE (Berdasarkan Gambar 6)
        // Disertai dengan rekomendasi belajar yang lebih estetik dan mendalam
        if ($jam > 5.5) {
            $label = "Mahasiswa Sangat Aktif dan Menggunakan AI";
            $tips = "Luar biasa! Kamu memiliki dedikasi tinggi. Rekomendasi: Pastikan imbangi dengan teknik Pomodoro agar tidak burnout dan jaga kualitas istirahat.";
        } else {
            if ($ai == 1) {
                $label = "Mahasiswa Belajar Santai";
                $tips = "Efisiensi tinggi! Rekomendasi: Terus manfaatkan AI untuk deep work pada materi yang paling sulit agar waktu belajarmu tetap berkualitas.";
            } else {
                $label = "Mahasiswa Aktif Belajar";
                $tips = "Fokusmu solid. Rekomendasi: Coba eksplorasi tools AI seperti ChatGPT untuk merangkum materi agar proses belajarmu bisa lebih cepat dan hemat waktu.";
            }
        }

        StudyResult::create([
            'user_id' => Auth::id(),
            'nama_lengkap' => $request->nama_lengkap,
            'angkatan' => $request->angkatan,
            'semester' => $request->semester,
            'jam_belajar' => $jam,
            'pakai_ai' => $ai,
            'hasil_label' => $label,
            'saran_rekomendasi' => $tips,
        ]);

        return redirect()->route('dashboard')->with('success', 'Analisis Selesai! Hasil klasifikasimu: ' . $label);
    }
}