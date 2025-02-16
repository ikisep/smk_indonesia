@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Input Nilai Siswa</h1>
    </div>

    <div class="mt-4 bg-white shadow rounded-lg p-4">
        <form action="{{ route('nilai.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="grid grid-cols-3 gap-4">
                <!-- Pilih Kelas -->
                <div>
                    <label class="block text-gray-700">Kelas</label>
                    <select id="classSelection" class="w-full border rounded p-2" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($classes as $classItem)
                            <option value="{{ $classItem->class }}">{{ $classItem->class }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Siswa -->
                <div>
                    <label class="block text-gray-700">Siswa</label>
                    <select id="studentSelection" name="student_id" class="w-full border rounded p-2" required>
                        <option value="">Pilih Siswa</option>
                        @foreach($students as $student)
                            <option data-class="{{ $student->class }}" value="{{ $student->id }}">
                                {{ $student->name }} ({{ $student->class }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Mata Pelajaran -->
                <div>
                    <label class="block text-gray-700">Mata Pelajaran</label>
                    <select name="mapel_id" class="w-full border rounded p-2" required>
                        <option value="">Pilih Mata Pelajaran</option>
                        @foreach($mapels as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Nilai UTS -->
                <div>
                    <label class="block text-gray-700">UTS</label>
                    <input type="number" name="uts" class="w-full border rounded p-2" required>
                </div>

                <!-- Input Nilai UAS -->
                <div>
                    <label class="block text-gray-700">UAS</label>
                    <input type="number" name="uas" class="w-full border rounded p-2" required>
                </div>

                <!-- Input Nilai Tugas -->
                <div>
                    <label class="block text-gray-700">Tugas</label>
                    <input type="number" name="tugas" class="w-full border rounded p-2" required>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
                Simpan Nilai
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('classSelection').addEventListener('change', function() {
        let selectedClass = this.value;
        let studentSelection = document.getElementById('studentSelection');

        // Reset pilihan siswa
        studentSelection.value = "";

        // Tampilkan siswa yang sesuai dengan kelas yang dipilih
        Array.from(studentSelection.options).forEach(option => {
            if (option.getAttribute('data-class') === selectedClass || option.value === "") {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
    });
</script>

@endsection
