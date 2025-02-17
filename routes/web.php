<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GurusController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MuridController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk halaman login
// Menampilkan halaman login (GET)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Menangani form login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Route untuk logout (POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware untuk admin dan guru
Route::middleware(['auth', 'role:admin,guru'])->group(function () {
    Route::get('/admin/kelas', [NilaiController::class, 'index'])->name('kelas.list');
    Route::get('/admin/murid', [NilaiController::class, 'index'])->name('murid');
    Route::get('/admin/kelas/{class?}', [NilaiController::class, 'showClass'])->name('kelas.show');
    Route::get('/admin/nilai/{id}', [NilaiController::class, 'showStudent'])->name('admin.nilai');
    Route::get('/admin/siswa/{id}', [NilaiController::class, 'showStudent'])->name('siswa.nilai');
    Route::get('/admin/input_nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('/admin/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');
    Route::get('/admin/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
    Route::put('/admin/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
    Route::delete('/admin/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
});

// Middleware untuk siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/nilai', [NilaiController::class, 'myGrades'])->name('siswa.nilai');
    // Route::get('/siswa/gambar', [NilaiController::class, 'myImages'])->name('siswa.gambar');
});


// Rute untuk data siswa
Route::get('/admin/data_siswa', [GuruController::class, 'dataSiswa'])->name('admin.dataSiswa');

// Rute untuk data kelas
Route::get('/admin/data_kelas', [GuruController::class, 'dataKelas'])->name('admin.dataKelas');


// Route tambahan lainnya
Route::resource('/guru', GurusController::class);
Route::resource('/mapel', MapelController::class);

// Route untuk input nilai
Route::get('/user', [NilaiController::class, 'index']);
Route::get('/input-nilai', [NilaiController::class, 'create']);
Route::post('/simpan-nilai', [NilaiController::class, 'store']);
Route::get('/cek-nilai', [NilaiController::class, 'show']);

Route::resource('users', UsersController::class);
Route::resource('gallery', GalleryController::class);
Route::resource('murid', MuridController::class);

Route::get('/nilai/cetak-pdf', [NilaiController::class, 'cetakPDF'])->name('nilai.cetak_pdf');


