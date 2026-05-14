<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudyResultController;
use App\Http\Controllers\AdminController;
use App\Models\StudyResult;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Redirect Halaman Utama
Route::get('/', function () {
    return redirect('/login');
});

// 2. Autentikasi (Guest)
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Halaman Terproteksi (Login Only)
Route::middleware(['auth'])->group(function () {
    
    // Dashboard Pribadi User
    Route::get('/dashboard', [StudyResultController::class, 'index'])->name('dashboard');

    // Input Data Klasifikasi
    Route::get('/input-data', function () {
        return view('input');
    })->name('input.data');

    // Proses Perhitungan Decision Tree
    Route::post('/hitung', [StudyResultController::class, 'store'])->name('hitung.store');
    
    // Halaman Khusus Admin (Statistik Global)
    Route::get('/admin', [AdminController::class, 'index'])->middleware('can:admin-only')->name('admin.index');

    // Fitur Cetak Hasil (Print)
    Route::get('/print-result/{id}', function($id) {
        $data = StudyResult::findOrFail($id);
        
        // Proteksi agar user tidak bisa mengintip hasil print orang lain, kecuali dia Admin
        if($data->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Akses tidak sah.');
        }
        
        return view('print', compact('data'));
    })->name('print.result');
});