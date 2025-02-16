@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-700">Galeri</h2>
        <a href="{{ route('gallery.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            ➕ Tambah Gambar
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($galleries as $gallery)
            <div class="bg-gray-100 p-3 rounded-lg shadow-md">
                <img src="data:image/jpeg;base64,{{ $gallery->imageBase64 }}" class="w-full h-40 object-cover rounded-lg">
                <h3 class="text-lg font-semibold mt-2">{{ $gallery->name }}</h3>

                <div class="flex space-x-2 mt-2">
                    <a href="{{ route('gallery.edit', $gallery->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg hover:bg-yellow-600">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">
                            ❌ Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
