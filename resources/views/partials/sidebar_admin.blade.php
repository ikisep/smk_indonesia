<aside class="w-64 min-h-screen bg-gray-900 text-white shadow-lg">
    <!-- Profil User -->
    <div class="flex flex-col items-center p-5 border-b border-gray-700">
        <img src="#" alt="User Avatar" class="w-14 h-14 rounded-full border-2 border-gray-500">
        <h3 class="text-lg font-semibold mt-2">John David</h3>
        <span class="text-green-400 text-sm">● Online</span>
    </div>

    <!-- Menu Sidebar -->
    <nav class="mt-5">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('users.index')}}" class="flex items-center space-x-3 px-5 py-2 hover:bg-gray-700 transition rounded-md">
                    <span>⚙️</span>
                    <span>Data Login</span>
                </a>
            </li>
            <li>
                <a href="{{ route('guru.index')}}" class="flex items-center space-x-3 px-5 py-2 hover:bg-gray-700 transition rounded-md">
                    <span>📘</span>
                    <span>Data Guru</span>
                </a>
            </li>
            <li>
                <a href="{{ route('murid.index')}}" class="flex items-center space-x-3 px-5 py-2 hover:bg-gray-700 transition rounded-md">
                    <span>📘</span>
                    <span>Data Murid</span>
                </a>
            </li>
            <li>
                <a href="{{ route('mapel.index')}}" class="flex items-center space-x-3 px-5 py-2 hover:bg-gray-700 transition rounded-md">
                    <span>📚</span>
                    <span>Data Mapel</span>
                </a>
            </li>
            <li>
                <a href="{{ route('gallery.index')}}" class="flex items-center space-x-3 px-5 py-2 hover:bg-gray-700 transition rounded-md">
                    <span>📚</span>
                    <span>Data Gallery</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kelas.show')}}" class="flex items-center space-x-3 px-5 py-2 hover:bg-gray-700 transition rounded-md">
                    <span>📊</span>
                    <span>Data Nilai</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
