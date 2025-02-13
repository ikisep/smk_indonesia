@extends('layouts.app')

@section('content')
    <h1>Edit Nilai Siswa</h1>

    <form action="{{ route('nilai.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Mata Pelajaran:</label>
        <input type="text" name="subject" value="{{ $grade->subject }}" readonly>
        <label>UTS:</label>
        <input type="number" name="uts" value="{{ $grade->uts }}" required>
        <label>UAS:</label>
        <input type="number" name="uas" value="{{ $grade->uas }}" required>
        <label>Tugas:</label>
        <input type="number" name="tugas" value="{{ $grade->tugas }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
