@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Tambah Mapel</h1>

    <form action="{{ route('mapel.store') }}" method="POST">
        @csrf
        <label class="block mt-2">Nama Mapel:</label>
        <input type="text" name="nama" class="border px-3 py-1 rounded w-full" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Simpan</button>
    </form>
@endsection
