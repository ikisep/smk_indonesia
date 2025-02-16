@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Daftar Guru</h2>
        <a href="{{ route('guru.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            ➕ Tambah Guru
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($gurus as $guru)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2 font-semibold">{{ $guru->id }}</td>
                        <td class="px-4 py-2">{{ $guru->nama }}</td>
                        <td class="px-4 py-2 text-center flex space-x-2 justify-center">
                            <a href="{{ route('guru.edit', $guru->id) }}" class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">
                                    ❌ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
