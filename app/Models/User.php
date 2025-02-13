<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password'];


    // Di dalam Model User.php
    // app/Models/User.php
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id'); // 'class_id' adalah foreign key yang merujuk ke tabel 'kelas'
    }
}
