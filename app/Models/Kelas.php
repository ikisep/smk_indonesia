<?php

// app/Models/Kelas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['class_name'];

    public function students()
    {
        return $this->hasMany(User::class, 'class_id');  // Relasi satu kelas memiliki banyak siswa
    }
}
