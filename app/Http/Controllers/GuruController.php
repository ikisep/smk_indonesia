<?php

// app/Http/Controllers/GuruController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
// use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Menampilkan data siswa berdasarkan kelas
    // app/Http/Controllers/GuruController.php
//     public function dataSiswa()
// {
//     $siswa = User::with('kelas')->where('role', 'siswa')->get();  // Memuat relasi 'kelas' bersama data siswa
//     return view('admin.data_siswa', compact('siswa'));
// }


    // Menampilkan data kelas
    // public function dataKelas()
    // {
    //     $kelas = Kelas::all(); // Ambil seluruh data kelas
    //     return view('admin.data_kelas', compact('kelas'));
    // }
}
