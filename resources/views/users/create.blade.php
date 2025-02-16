@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">Tambah Pengguna</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf
        <!-- Nama -->
        <div>
            <label class="block text-gray-600 font-medium">Nama</label>
            <input type="text" name="name" placeholder="Masukkan nama"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-600 font-medium">Email</label>
            <input type="email" name="email" placeholder="Masukkan email"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Password -->
        <div>
            <label class="block text-gray-600 font-medium">Password</label>
            <input type="password" name="password" placeholder="Masukkan password"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Role -->
        <div>
            <label class="block text-gray-600 font-medium">Role</label>
            <select name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
            </select>
        </div>

        <!-- Kelas (Opsional) -->
        <div>
            <label class="block text-gray-600 font-medium">Kelas</label>
            <input type="text" name="class" placeholder="Masukkan kelas (Opsional)"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Absen -->
        <div>
            <label class="block text-gray-600 font-medium">Absen</label>
            <input type="number" name="absen" placeholder="Masukkan nomor absen"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-center">
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
