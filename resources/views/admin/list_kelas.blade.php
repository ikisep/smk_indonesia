@extends('layouts.app')

@section('title', 'Daftar Kelas')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Daftar Kelas</h2>
        {{-- <a href="{{ route('kelas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            ➕ Tambah Kelas
        </a> --}}
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Kelas</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($classes as $index => $classItem)
                    @if (!empty($classItem->class))
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2 font-semibold">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $classItem->class }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('kelas.show', ['class' => $classItem->class]) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                                    🔍 Lihat
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
