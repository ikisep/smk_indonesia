@extends('layouts.app')

@section('title', 'Admin Profile')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Admin Profile</h2>
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            ➕ Add Admin Profile
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Username</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Password</th>
                    <th class="px-4 py-2 text-center">EDIT</th>
                    <th class="px-4 py-2 text-center">DELETE</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2 font-semibold">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-center">
                            <span class="bg-gray-400 text-white px-2 py-1 rounded-lg">******</span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600">
                                ✏️ Edit
                            </a>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600" onclick="return confirm('Are you sure?')">
                                    ❌ Delete
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
