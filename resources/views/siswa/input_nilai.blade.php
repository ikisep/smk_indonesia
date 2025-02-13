@extends('layouts.user')

@section('content')
<div class="max-w-lg mx-auto mt-10 p-5 shadow-lg rounded-lg bg-white">
    <h2 class="text-2xl font-semibold text-center">Input Nilai Siswa</h2>
    <form action="/simpan-nilai" method="POST" class="mt-5">
        @csrf
        <label class="block font-medium">Nama Siswa:</label>
        <input type="text" name="nama_siswa" class="w-full p-2 border rounded mb-3" required>

        <label class="block font-medium">Nomor Induk Siswa (NIS):</label>
        <input type="number" name="nis" class="w-full p-2 border rounded mb-3" required>

        <label class="block font-medium">Mata Pelajaran:</label>
        <input type="text" name="mata_pelajaran" class="w-full p-2 border rounded mb-3" required>

        <label class="block font-medium">Nilai:</label>
        <input type="number" name="nilai" class="w-full p-2 border rounded mb-3" required>

        <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded w-full">Simpan</button>
    </form>
</div>
@endsection
