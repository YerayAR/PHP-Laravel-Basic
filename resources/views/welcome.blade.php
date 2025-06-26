{{-- Landing page view --}}
@extends('layouts.app')

@section('content')
<div class="text-center mt-10">
    <div class="card mx-auto max-w-2xl">
        <h1 class="text-violet text-5xl mb-6 font-bold">⚡ CYBERPUNK CONTROL PANEL ⚡</h1>
        <p class="text-cyan text-lg mb-8">Your futuristic network management dashboard.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div class="card bg-gray-900">
                <h3 class="text-magenta text-xl mb-3">🌐 Network Nodes</h3>
                <p class="text-gray-300 mb-4">Manage and monitor network infrastructure</p>
                @auth
                    <a href="/nodes" class="bg-violet text-white px-4 py-2 rounded hover:bg-magenta transition-colors">Access Nodes</a>
                @else
                    <p class="text-gray-500">Login required to access</p>
                @endauth
            </div>
            
            <div class="card bg-gray-900">
                <h3 class="text-cyan text-xl mb-3">🎛️ Dashboard</h3>
                <p class="text-gray-300 mb-4">Personal control center and settings</p>
                @auth
                    <a href="/dashboard" class="bg-cyan text-black px-4 py-2 rounded hover:bg-violet transition-colors">Enter Dashboard</a>
                @else
                    <a href="/login" class="bg-magenta text-white px-4 py-2 rounded hover:bg-cyan transition-colors">Connect</a>
                @endauth
            </div>
        </div>
        
        @guest
        <div class="mt-8">
            <p class="text-gray-400 mb-4">Join the network:</p>
            <div class="flex justify-center space-x-4">
                <a href="/login" class="bg-violet text-white px-6 py-3 rounded-lg hover:bg-magenta transition-all transform hover:scale-105">LOGIN</a>
                <a href="/register" class="bg-cyan text-black px-6 py-3 rounded-lg hover:bg-violet hover:text-white transition-all transform hover:scale-105">REGISTER</a>
            </div>
        </div>
        @endguest
    </div>
</div>
@endsection
