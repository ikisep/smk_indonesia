@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Kelas</h1>
        <div class="bg-white shadow-lg rounded-lg p-4">
            <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border-b">No</th>
                        <th class="p-3 border-b">Nama Kelas</th>
                        <th class="p-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $index => $classItem)
                        @if (!empty($classItem->class))
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3">{{ $index + 1 }}</td>
                                <td class="p-3">{{ $classItem->class }}</td>
                                <td class="p-3 text-center">
                                    <a href="{{ route('kelas.show', ['class' => $classItem->class]) }}" class="text-blue-500 hover:underline">Lihat</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection