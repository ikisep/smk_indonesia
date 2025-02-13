@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Kelas: {{ $class }}</h1>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Nilai Siswa</h1>
        <a href="{{ route('nilai.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Tambah Nilai</a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-4">
        <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border-b">No</th>
                    <th class="p-3 border-b">Nama Siswa</th>
                    <th class="p-3 border-b">Absen</th>
                    <th class="p-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $index => $student)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $student->name }}</td>
                    <td class="p-3">{{ $student->absen }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.nilai', $student->id) }}" class="text-blue-500 hover:underline">Lihat Nilai</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
