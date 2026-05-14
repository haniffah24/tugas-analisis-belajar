<?php

namespace App\Http\Controllers;

use App\Models\StudyResult;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() 
    {
        // Mengambil seluruh data user untuk statistik admin
        $allData = StudyResult::with('user')->latest()->get();
        
        $chartData = [
            'santai' => StudyResult::where('hasil_label', 'Mahasiswa Belajar Santai')->count(),
            'aktif' => StudyResult::where('hasil_label', 'Mahasiswa Aktif Belajar')->count(),
            'sangat_aktif' => StudyResult::where('hasil_label', 'Mahasiswa Sangat Aktif dan Menggunakan AI')->count(),
        ];

        return view('admin.statistics', compact('allData', 'chartData'));
    }
}