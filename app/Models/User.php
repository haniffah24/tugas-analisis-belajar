<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 
        'username', // Pastikan username ada di sini
        'password', 
        'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relasi: Satu user bisa punya banyak riwayat perhitungan
    public function studyResults()
    {
        return $this->hasMany(StudyResult::class);
    }
}