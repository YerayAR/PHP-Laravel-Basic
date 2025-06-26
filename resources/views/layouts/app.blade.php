{{--
    Base application layout used by all views.
    Provides the navigation bar and loads the core CSS stylesheet.
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-black text-white min-h-screen font-sans cyberpunk-grid">
    <!-- Cyberpunk grid background effect -->
    <div class="fixed inset-0 bg-gradient-to-br from-purple-900/10 to-cyan-900/10 pointer-events-none"></div>
    
    <!-- Floating particles -->
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 8s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 7s;"></div>
    </div>
    
    <nav class="relative z-10 p-4 bg-opacity-30 bg-gray-900 backdrop-blur-md flex justify-between border-b border-violet">
        <a href="/" class="text-magenta font-bold text-xl flex items-center">
            <span class="mr-2">⚡</span>CYBERPUNK<span class="text-cyan">APP</span>
        </a>
        <div class="flex items-center space-x-4">
            @auth
                <span class="text-green-400 text-sm">● CONNECTED</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-sm transition-colors">DISCONNECT</button>
                </form>
            @else
                <span class="text-red-400 text-sm">● OFFLINE</span>
                <a href="{{ route('login') }}" class="bg-violet hover:bg-magenta px-3 py-1 rounded text-sm transition-colors mr-2">CONNECT</a>
                <a href="{{ route('register') }}" class="bg-cyan hover:bg-violet text-black hover:text-white px-3 py-1 rounded text-sm transition-colors">JOIN</a>
            @endauth
        </div>
    </nav>
    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
