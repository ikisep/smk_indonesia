@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Tambah Mapel</h1>

    <form action="{{ route('murid.store') }}" method="POST">
        @csrf
        <label class="block mt-2">Nama Mapel:</label>
        <input type="text" name="nama" class="border px-3 py-1 rounded w-full" required>

        <label class="block mt-2">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" class="border px-3 py-1 rounded w-full" required>

        <label class="block mt-2">Alamat:</label>
        <input type="text" name="alamat" class="border px-3 py-1 rounded w-full" required>
        

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Simpan</button>
    </form>
@endsection
