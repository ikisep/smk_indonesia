<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mata_pelajaran';
    protected $fillable = ['nama'];
    public $timestamps = false;

    public function grades()
    {
        return $this->hasMany(Grade::class, 'mapel_id');
    }
}
