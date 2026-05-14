<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('study_results', function (Blueprint $table) {
            $table->id();
            // Menghubungkan data ke user yang login
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Kolom sesuai data responden (image_be4b5d.png)
            $table->string('nama_lengkap');
            $table->string('angkatan');
            $table->integer('semester');
            
            // Kolom untuk input Machine Learning (image_beac9b.png)
            $table->decimal('jam_belajar', 4, 2); 
            $table->boolean('pakai_ai'); // 1 = Ya, 0 = Tidak
            
            // Kolom Hasil Kalkulasi & Fitur Tambahan
            $table->string('hasil_label'); // Menyimpan tipe mahasiswa
            $table->text('saran_rekomendasi')->nullable(); // Untuk tips belajar
            
            $table->timestamps(); // Berguna untuk fitur History
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_results');
    }
};