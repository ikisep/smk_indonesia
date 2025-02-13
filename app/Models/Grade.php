<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['student_id', 'subject', 'uts', 'uas', 'tugas', 'na', 'grade'];
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}