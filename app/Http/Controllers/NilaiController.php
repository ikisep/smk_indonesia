<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Menampilkan nilai seorang siswa
        $student = User::findOrFail($id);
        $grades = Grade::where('student_id', $id)->get();
        return view('admin.nilai_siswa', compact('student', 'grades'));
    }

    public function create()
{
    // Ambil daftar kelas unik dari siswa
    $classes = User::where('role', 'siswa')->whereNotNull('class')->select('class')->distinct()->get();
    $students = User::where('role', 'siswa')->get(); // Ambil semua siswa

    return view('admin.input_nilai', compact('classes', 'students'));
}


    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'student_id' => 'required',
        'subject' => 'required',
        'uts' => 'required|numeric',
        'uas' => 'required|numeric',
        'tugas' => 'required|numeric',
    ]);

    // Simpan nilai ke database
    $na = ($request->uts + $request->uas + $request->tugas) / 3;
    $grade = $this->calculateGrade($na);

    $grade = Grade::create([
        'student_id' => $request->student_id,
        'subject' => $request->subject,
        'uts' => $request->uts,
        'uas' => $request->uas,
        'tugas' => $request->tugas,
        'na' => $na,
        'grade' => $grade,
    ]);

    // Redirect ke halaman nilai siswa berdasarkan student_id yang baru ditambahkan
    return redirect()->route('admin.nilai', ['id' => $request->student_id])
                     ->with('success', 'Nilai berhasil ditambahkan');
}

    public function edit($id)
    {
        // Form untuk mengedit nilai siswa
        $grade = Grade::findOrFail($id);
        return view('admin.edit_nilai', compact('grade'));
    }

    public function update(Request $request, $id)
    {
        // Update nilai siswa
        $grade = Grade::findOrFail($id);
        $na = ($request->uts + $request->uas + $request->tugas) / 3;
        $grade->update([
            'uts' => $request->uts,
            'uas' => $request->uas,
            'tugas' => $request->tugas,
            'na' => $na,
            'grade' => $this->calculateGrade($na),
        ]);

        return redirect()->route('siswa.nilai', $grade->student_id)->with('success', 'Nilai berhasil diperbarui');
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


}
