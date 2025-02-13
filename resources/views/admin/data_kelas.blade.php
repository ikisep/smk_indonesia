
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Data Kelas</h2>

    <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border-b">Nama Kelas</th>
                <th class="p-3 border-b">Jumlah Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $class)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $class->class_name }}</td>
                    <td class="p-3">{{ $class->students->count() }}</td> <!-- Jumlah siswa di kelas ini -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
