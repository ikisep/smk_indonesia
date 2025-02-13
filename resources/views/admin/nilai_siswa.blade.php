@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    

    <div class="mt-4 bg-white shadow rounded-lg p-4">
        <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border-b">Kelas</th>
                    <th class="p-3 border-b">Absen</th>
                    <th class="p-3 border-b">Nama</th>
                    <th class="p-3 border-b">Mata Pelajaran</th>
                    <th class="p-3 border-b">UTS</th>
                    <th class="p-3 border-b">UAS</th>
                    <th class="p-3 border-b">Tugas</th>
                    <th class="p-3 border-b">Nilai Akhir</th>
                    <th class="p-3 border-b">Grade</th>
                    <th class="p-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $grade->student->class }}</td>
                        <td class="p-3">{{ $grade->student->absen }}</td>
                        <td class="p-3">{{ $grade->student->name }}</td>
                        <td class="p-3">{{ $grade->subject }}</td>
                        <td class="p-3">{{ $grade->uts }}</td>
                        <td class="p-3">{{ $grade->uas }}</td>
                        <td class="p-3">{{ $grade->tugas }}</td>
                        <td class="p-3 font-semibold">{{ $grade->na }}</td>
                        <td class="p-3 font-semibold text-center">
                            <span class="px-3 py-1 rounded-full {{ $grade->grade == 'A' ? 'bg-green-500 text-white' : ($grade->grade == 'B' ? 'bg-blue-500 text-white' : ($grade->grade == 'C' ? 'bg-yellow-500 text-black' : 'bg-red-500 text-white')) }}">
                                {{ $grade->grade }}
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            <a href="{{ route('nilai.edit', $grade->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('nilai.destroy', $grade->id) }}" method="POST" class="inline-block ml-2">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
