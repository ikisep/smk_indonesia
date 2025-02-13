<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@school.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Guru A',
            'email' => 'guru@school.com',
            'password' => Hash::make('password'),
            'role' => 'guru'
        ]);

        User::create([
            'name' => 'Siswa A',
            'email' => 'siswa@school.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'class_id' => 2, // ID kelas X IPA
            'absen' => 13
        ]);

        User::create([
            'name' => 'Siswa A',
            'email' => 'siswa1@school.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'class_id' => 1, // ID kelas X IPA
            'absen' => 12
        ]);
    }
}
