@extends('layouts.user')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Nilai Saya</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
        </form>        
    </div>

    @if(isset($student))
    <div class="bg-white shadow-lg rounded-lg p-4">
        <h2 class="text-lg font-semibold">Nama: {{ $student->name }}</h2>
        <p class="text-gray-600">Kelas: {{ $student->class }} | Absen: {{ $student->absen }}</p>
    </div>
    @else
        <p class="text-red-500">Data siswa tidak ditemukan.</p>
    @endif

    <div class="mt-4 bg-white shadow rounded-lg p-4">
        @if(isset($grades) && count($grades) > 0)
        <table class="w-full border-collapse border border-gray-200 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border-b">Mata Pelajaran</th>
                    {{-- <th class="p-3 border-b">UTS</th> --}}
                    {{-- <th class="p-3 border-b">UAS</th> --}}
                    {{-- <th class="p-3 border-b">Tugas</th> --}}
                    <th class="p-3 border-b">Nilai Akhir</th>
                    <th class="p-3 border-b">Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $grade->subject }}</td>
                        {{-- <td class="p-3">{{ $grade->uts }}</td> --}}
                        {{-- <td class="p-3">{{ $grade->uas }}</td> --}}
                        {{-- <td class="p-3">{{ $grade->tugas }}</td> --}}
                        <td class="p-3 font-semibold">{{ $grade->na }}</td>
                        <td class="p-3 font-semibold text-center">
                            <span class="px-3 py-1 rounded-full {{ $grade->grade == 'A' ? 'bg-green-500 text-white' : ($grade->grade == 'B' ? 'bg-blue-500 text-white' : ($grade->grade == 'C' ? 'bg-yellow-500 text-black' : 'bg-red-500 text-white')) }}">
                                {{ $grade->grade }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="text-gray-600">Belum ada nilai yang tersedia.</p>
        @endif
    </div>
</div>
@endsection
