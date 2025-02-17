<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use App\Models\Grade;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade as PDF;


class NilaiController extends Controller
{
    public function index()
    {
        // Menampilkan daftar kelas untuk memilih kelas mana yang ingin dilihat
        $classes = User::where('role', 'siswa')->whereNotNull('class')->select('class')->distinct()->get();
        return view('admin.list_kelas', compact('classes'));
    }

    public function showClass($class)
    {
        // Menampilkan daftar siswa dalam kelas tertentu
        $students = User::where('class', $class)->where('role', 'siswa')->orderBy('absen')->get();
        return view('admin.list_siswa', compact('students', 'class'));
    }

    public function showStudent($id)
{
    $student = User::findOrFail($id);
    $grades = Grade::where('student_id', $id)->with('mapel')->get(); // Ambil data nilai dengan mata pelajaran

    return view('admin.nilai_siswa', compact('student', 'grades'));
}


public function create()
{
    // Ambil daftar kelas unik dari siswa
    $classes = User::where('role', 'siswa')->whereNotNull('class')->select('class')->distinct()->get();
    $students = User::where('role', 'siswa')->get(); // Ambil semua siswa
    $mapels = Mapel::all(); // Ambil semua mata pelajaran

    return view('admin.input_nilai', compact('classes', 'students', 'mapels'));
}


public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'student_id' => 'required',
        'mapel_id' => 'required|exists:mata_pelajaran,id',
        'uts' => 'required|numeric',
        'uas' => 'required|numeric',
        'tugas' => 'required|numeric',
    ]);

    // Hitung nilai akhir dan grade
    $na = ($request->uts + $request->uas + $request->tugas) / 3;
    $grade = $this->calculateGrade($na);

    // Simpan nilai ke database
    Grade::create([
        'student_id' => $request->student_id,
        'mapel_id' => $request->mapel_id,
        'uts' => $request->uts,
        'uas' => $request->uas,
        'tugas' => $request->tugas,
        'na' => $na,
        'grade' => $grade,
    ]);

    return redirect()->route('admin.nilai', ['id' => $request->student_id])
                     ->with('success', 'Nilai berhasil ditambahkan');
}


public function edit($id)
{
    // Ambil data nilai siswa beserta relasi ke mapel
    $grade = Grade::with('mapel')->findOrFail($id);
    
    // Ambil semua daftar mata pelajaran untuk dropdown
    $mapels = Mapel::all();

    return view('admin.edit_nilai', compact('grade', 'mapels'));
}

    public function update(Request $request, $id)
    {
        // Update nilai siswa
        $grade = Grade::findOrFail($id);
        $na = ($request->uts + $request->uas + $request->tugas) / 3;
        $grade->update([
            'mapel_id' => $request->mapel_id,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'tugas' => $request->tugas,
            'na' => $na,
            'grade' => $this->calculateGrade($na),
        ]);

        return redirect()->route('admin.nilai', $grade->student_id)->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus nilai siswa
        Grade::destroy($id);
        return back()->with('success', 'Nilai berhasil dihapus');
    }

    private function calculateGrade($na)
    {
        if ($na >= 85) return 'A';
        if ($na >= 75) return 'B';
        if ($na >= 65) return 'C';
        if ($na >= 50) return 'D';
        return 'E';
    }

//     public function showStudent($id)
// {
//     $student = User::findOrFail($id); // Ambil data siswa berdasarkan ID
//     $grades = Grade::where('student_id', $id)->get(); // Ambil semua nilai siswa ini

//     return view('siswa.nilai', compact('student', 'grades'));

// }

public function myGrades()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $student = Auth::user(); // Mengambil data siswa yang sedang login
    $grades = Grade::where('student_id', $student->id)->get(); // Mengambil nilai siswa

    return view('siswa.nilai', compact('student', 'grades'));
}

public function myImages()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $images = Gallery::all(); // Mengambil semua gambar tanpa filter student_id

    return view('siswa.gambar', compact('images'));
}


// public function cetakPDF()
// {
//     $grades = Grade::with(['student', 'mapel'])->get();

//     $pdf = app('dompdf.wrapper')->loadView('admin.cetak_nilai', compact('grades'))->setPaper('a4', 'landscape');

//     return $pdf->stream('Daftar_Nilai.pdf');
// }





}
