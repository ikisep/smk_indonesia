@extends('layouts.app')

@section('title', 'Nilai Siswa')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <!-- Judul Kelas -->
    <div class="border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Kelas: {{ $class }}</h2>
    </div>

    <!-- Judul & Tombol Tambah Nilai -->
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Nilai Siswa</h2>
        <a href="{{ route('nilai.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            ➕ Tambah Nilai
        </a>
    </div>

    <!-- Tabel Nilai Siswa -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Siswa</th>
                    <th class="px-4 py-2 text-left">Absen</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($students as $index => $student)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2 font-semibold">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $student->name }}</td>
                        <td class="px-4 py-2">{{ $student->absen }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.nilai', $student->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                                🔍 Lihat Nilai
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
