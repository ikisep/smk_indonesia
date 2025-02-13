@extends('layouts.user')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-5 shadow-lg rounded-lg bg-white">
    <h2 class="text-2xl font-semibold text-center">Daftar Nilai Siswa</h2>
    <table class="w-full mt-5 border-collapse border border-gray-300">
        <tr class="bg-gray-100">
            <th class="border p-2">Nama Siswa</th>
            <th class="border p-2">NIS</th>
            <th class="border p-2">Mata Pelajaran</th>
            <th class="border p-2">Nilai</th>
        </tr>
        @foreach ($nilai as $n)
        <tr>
            <td class="border p-2">{{ $n['nama_siswa'] }}</td>
            <td class="border p-2">{{ $n['nis'] }}</td>
            <td class="border p-2">{{ $n['mata_pelajaran'] }}</td>
            <td class="border p-2">{{ $n['nilai'] }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
