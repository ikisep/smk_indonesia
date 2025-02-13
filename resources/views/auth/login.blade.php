<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-teal-400 to-purple-500">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('path/to/logo.png') }}" alt="Logo" class="w-12 h-12">
            </div>
            <h1 class="text-2xl font-bold text-center mb-6">Login</h1>
            <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700">Email</label>
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <span class="text-gray-500 pr-2">📧</span>
                        <input type="email" name="email" class="w-full border-none focus:outline-none" placeholder="Type your email" required>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Password</label>
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <span class="text-gray-500 pr-2">🔒</span>
                        <input type="password" name="password" class="w-full border-none focus:outline-none" placeholder="Type your password" required>
                    </div>
                </div>
                <div class="text-right text-sm text-blue-500">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="w-full py-2 text-white font-bold bg-gradient-to-r from-teal-400 to-purple-500 rounded-lg">LOGIN</button>
            </form>
            <div class="text-center mt-4 text-gray-600">Or Sign Up Using</div>
            <div class="flex justify-center gap-4 mt-2">
                <div class="w-8 h-8 bg-blue-600 rounded-full"></div>
                <div class="w-8 h-8 bg-red-500 rounded-full"></div>
                <div class="w-8 h-8 bg-gradient-to-r from-teal-400 to-purple-500 rounded-full"></div>
            </div>
        </div>
    </div>
</body>
</html>
