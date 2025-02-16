@extends('layouts.app')

@section('title', 'Daftar Nilai')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Daftar Nilai</h2>
        {{-- <a href="{{ route('nilai.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            ➕ Tambah Nilai
        </a> --}}
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Kelas</th>
                    <th class="px-4 py-2 text-left">Absen</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Mata Pelajaran</th>
                    <th class="px-4 py-2 text-left">UTS</th>
                    <th class="px-4 py-2 text-left">UAS</th>
                    <th class="px-4 py-2 text-left">Tugas</th>
                    <th class="px-4 py-2 text-left">Nilai Akhir</th>
                    <th class="px-4 py-2 text-center">Grade</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($grades as $grade)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2 font-semibold">{{ $grade->student->class }}</td>
                        <td class="px-4 py-2">{{ $grade->student->absen }}</td>
                        <td class="px-4 py-2">{{ $grade->student->name }}</td>
                        <td class="px-4 py-2">{{ $grade->subject }}</td>
                        <td class="px-4 py-2">{{ $grade->uts }}</td>
                        <td class="px-4 py-2">{{ $grade->uas }}</td>
                        <td class="px-4 py-2">{{ $grade->tugas }}</td>
                        <td class="px-4 py-2 font-semibold">{{ $grade->na }}</td>
                        <td class="px-4 py-2 text-center">
                            <span class="px-3 py-1 rounded-full 
                                {{ $grade->grade == 'A' ? 'bg-green-500 text-white' : 
                                ($grade->grade == 'B' ? 'bg-blue-500 text-white' : 
                                ($grade->grade == 'C' ? 'bg-yellow-500 text-black' : 
                                'bg-red-500 text-white')) }}">
                                {{ $grade->grade }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center flex space-x-2 justify-center">
                            <a href="{{ route('nilai.edit', $grade->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('nilai.destroy', $grade->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">
                                    ❌ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
