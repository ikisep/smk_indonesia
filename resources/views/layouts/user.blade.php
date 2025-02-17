<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 text-white flex justify-between items-center shadow-md">
        <!-- Logo / Judul -->
        <div class="text-lg font-bold flex items-center space-x-2">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-8">
            <span>User Panel - Sistem Input Nilai</span>
        </div>

        <!-- Menu Navigasi -->
        <div class="flex space-x-6">
            {{-- <a href="{{ route('home') }}" class="hover:text-gray-200">🏠 Home</a> --}}
            <a href="{{ route('siswa.nilai') }}" class="hover:text-gray-200">📊 Data Nilai</a>
        </div>

        <!-- User Info -->
        <div class="flex items-center space-x-4">
            @if(Auth::check())
                <img src="{{ asset('image/user.png') }}" alt="User Avatar" class="w-10 h-10 rounded-full border-2 border-white">
                <span>{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition">
                        🚪 Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-green-500 px-4 py-2 rounded-lg hover:bg-green-600 transition">
                    🔑 Login
                </a>
            @endif
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

</body>
</html>
