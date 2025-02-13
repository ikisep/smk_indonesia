@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Daftar Mapel</h1>
    <a href="{{ route('mapel.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Tambah Guru</a>

    <table class="w-full border-collapse border text-left mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mapels as $mapel)
                <tr>
                    <td class="p-2 border">{{ $mapel->id }}</td>
                    <td class="p-2 border">{{ $mapel->nama }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('mapel.edit', $mapel->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('guru.destroy', $mapel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
