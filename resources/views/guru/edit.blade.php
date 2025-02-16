@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">Edit Guru</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guru.update', $guru->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama Guru -->
        <div>
            <label class="block text-gray-600 font-medium">Nama Guru</label>
            <input type="text" name="nama" value="{{ $guru->nama }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Tombol Update -->
        <div class="flex justify-center">
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
