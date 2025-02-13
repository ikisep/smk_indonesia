@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Edit Subject</h1>

    <form action="{{ route('guru.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="block">Name:</label>
        <input type="text" name="name" class="border px-3 py-1 rounded w-full" value="{{ $subject->name }}" required>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Update</button>
    </form>
@endsection
