
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Data Siswa</h2>

    <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border-b">Nama</th>
                <th class="p-3 border-b">Absen</th>
                <th class="p-3 border-b">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $student)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $student->name }}</td>
                    <td class="p-3">{{ $student->absen }}</td>
                    <td class="p-3">{{ $student->kelas ? $student->kelas->class_name : 'Tidak Ada Kelas' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
