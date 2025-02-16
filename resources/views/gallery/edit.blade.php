@extends('layouts.app')

@section('title', 'Edit Gambar')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">Edit Gambar</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div>
            <label class="block text-gray-600 font-medium">Nama</label>
            <input type="text" name="name" value="{{ $gallery->name }}" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Preview Gambar Lama -->
        <div class="mt-2">
            <p class="text-gray-600 font-medium">Gambar Saat Ini:</p>
            <img src="data:image/jpeg;base64,{{ base64_encode($gallery->image) }}" 
                 class="w-full h-40 object-cover rounded-lg mt-2">
        </div>

        <!-- Upload Gambar Baru -->
        <div>
            <label class="block text-gray-600 font-medium">Ganti Gambar (Opsional)</label>
            <input type="file" name="image" accept="image/*"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-center">
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
