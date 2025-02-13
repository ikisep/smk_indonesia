@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Tambah Guru</h1>

    <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <label class="block mt-2">Nama Guru:</label>
        <input type="text" name="name" class="border px-3 py-1 rounded w-full" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Simpan</button>
    </form>
@endsection
