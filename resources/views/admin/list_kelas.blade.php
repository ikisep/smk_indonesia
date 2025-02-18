@extends('layouts.app')

@section('title', 'Daftar Kelas')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Daftar Kelas</h2>
        {{-- Form Pencarian --}}
        <div class="flex items-center space-x-2">
            <input type="text" id="search" class="px-4 py-2 border border-gray-300 rounded-lg" placeholder="Cari Kelas..." onkeyup="searchClass()">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($classes as $index => $classItem)
            @if (!empty($classItem->class))
                <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 class-card">
                    <div class="font-semibold text-gray-700 mb-3">{{ $index + 1 }}. {{ $classItem->class }}</div>
                    <div class="text-center">
                        <a href="{{ route('kelas.show', ['class' => $classItem->class]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            🔍 Lihat
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script>
    // Fungsi untuk mencari kelas berdasarkan input
    function searchClass() {
        let input = document.getElementById("search");
        let filter = input.value.toLowerCase();
        let cards = document.getElementsByClassName("class-card");
        
        for (let i = 0; i < cards.length; i++) {
            let card = cards[i];
            let name = card.getElementsByClassName("font-semibold")[0];
            if (name) {
                let text = name.textContent || name.innerText;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }
    }
</script>
@endsection
