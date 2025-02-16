@extends('layouts.app')

@section('title', 'Daftar Mapel')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Daftar Mapel</h2>
        <a href="{{ route('murid.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            ➕ Tambah Mapel
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">tanggal_lahir</th>
                    <th class="px-4 py-2 text-left">alamat</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($murids as $murid)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2 font-semibold">{{ $murid->id }}</td>
                        <td class="px-4 py-2">{{ $murid->nama }}</td>
                        <td class="px-4 py-2">{{ $murid->tanggal_lahir }}</td>
                        <td class="px-4 py-2">{{ $murid->alamat }}</td>
                        <td class="px-4 py-2 text-center flex space-x-2 justify-center">
                            <a href="{{ route('murid.edit', $murid->id) }}" class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('murid.destroy', $murid->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="return confirm('Apakah Anda yakin?')">
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
