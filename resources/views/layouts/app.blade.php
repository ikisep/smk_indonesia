<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Wrapper -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        @if(Auth::check())
            <div id="sidebar" class="w-64 min-h-screen bg-gray-900 text-white shadow-lg transition-transform transform -translate-x-0">
                @if(Auth::user()->role == 'guru')
                    @include('partials.sidebar_guru')
                @else
                    @include('partials.sidebar_admin')
                @endif
            </div>
        @endif

        <!-- Konten Utama -->
        <div class="flex-1 flex flex-col">

            <!-- Navbar -->
            <header class="bg-gray-900 text-white px-6 py-3 flex justify-between items-center">
                <!-- Toggle Sidebar -->
                <button id="sidebarToggle" class="text-white text-2xl focus:outline-none">☰</button>

                <!-- Logo -->
                <div class="text-xl font-bold flex items-center">
                    <img src="{{ asset('image/smk.png') }}" alt="Logo" class="h-8 mr-2">
                    <span>Smkn 4 Padalarang</span>
                </div>

                <!-- Notifikasi, User & Logout -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-4">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    
                    <!-- Tombol Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Konten -->
            <main class="p-6 flex-1 overflow-auto">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- JavaScript untuk Toggle Sidebar -->
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            let sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('-translate-x-0')) {
                sidebar.classList.remove('-translate-x-0');
                sidebar.classList.add('-translate-x-full');
            } else {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('-translate-x-0');
            }
        });
    </script>

</body>
</html>
