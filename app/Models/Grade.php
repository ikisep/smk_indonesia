<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['student_id', 'mapel_id', 'uts', 'uas', 'tugas', 'na', 'grade'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
