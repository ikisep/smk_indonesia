<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        $classes = User::where('role', 'siswa')->select('class')->distinct()->get();
        return view('admin.list_kelas', compact('classes'));
    }

    public function showClass($class)
    {
        $students = User::where('class', $class)->where('role', 'siswa')->orderBy('absen')->get();
        return view('admin.list_siswa', compact('students', 'class'));
    }

    public function showStudent($id)
    {
        $student = User::findOrFail($id);
        $grades = Grade::where('student_id', $id)->get();
        return view('admin.nilai_siswa', compact('student', 'grades'));
    }

//     public function myGrades()
// {
//     $student = auth()->user(); // Mengambil data siswa yang sedang login
//     $grades = Grade::where('student_id', $student->id)->get(); // Mengambil nilai berdasarkan ID siswa

//     return view('siswa.nilai', compact('student', 'grades'));
// }

}
