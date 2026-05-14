<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyResult extends Model
{
    protected $table = 'study_results';

    protected $fillable = [
        'user_id', 'nama_lengkap', 'angkatan', 'semester', 
        'jam_belajar', 'pakai_ai', 'hasil_label', 'saran_rekomendasi'
    ];

    // Relasi balik ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}