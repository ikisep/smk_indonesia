@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">✏️ Edit Nilai Siswa</h1>

    <form action="{{ route('nilai.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Mata Pelajaran (Dropdown untuk Edit) -->
        <div class="mb-4">
            <label class="block text-gray-700">Mata Pelajaran:</label>
            <select name="mapel_id" class="border px-3 py-2 rounded w-full bg-gray-200" required>
                <option value="">Pilih Mata Pelajaran</option>
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->id }}" {{ $grade->mapel_id == $mapel->id ? 'selected' : '' }}>
                        {{ $mapel->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Input Nilai -->
        <div class="mb-4">
            <label class="block text-gray-700">UTS:</label>
            <input type="number" name="uts" value="{{ $grade->uts }}" class="border px-3 py-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">UAS:</label>
            <input type="number" name="uas" value="{{ $grade->uas }}" class="border px-3 py-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tugas:</label>
            <input type="number" name="tugas" value="{{ $grade->tugas }}" class="border px-3 py-2 rounded w-full" required>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            ✅ Update Nilai
        </button>
    </form>
</div>
@endsection
