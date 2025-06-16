<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-black text-white min-h-screen font-sans">
    <nav class="p-4 bg-opacity-30 bg-gray-900 backdrop-blur-md flex justify-between">
        <a href="/" class="text-magenta font-bold">CyberpunkApp</a>
        <div>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-cyan">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-cyan mr-4">Login</a>
                <a href="{{ route('register') }}" class="hover:text-cyan">Register</a>
            @endauth
        </div>
    </nav>
    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
