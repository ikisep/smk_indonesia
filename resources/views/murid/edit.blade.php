@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Edit Subject</h1>

    <form action="{{ route('murid.update', $murid->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="block">Nama:</label>
        <input type="text" name="nama" class="border px-3 py-1 rounded w-full" value="{{ $murid ->nama }}" required>

        <label class="block">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" class="border px-3 py-1 rounded w-full" value="{{ $murid ->tanggal_lahir }}" required>

        <label class="block">Alamat:</label>
        <input type="text" name="alamat" class="border px-3 py-1 rounded w-full" value="{{ $murid ->alamat }}" required>


        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Update</button>
    </form>
@endsection
