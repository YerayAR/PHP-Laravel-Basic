{{-- Login page view --}}
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-20">
    <div class="card neon-border">
        <h2 class="text-magenta text-3xl mb-6 text-center glitch">
            <span class="pulse-slow">🔒</span> SYSTEM ACCESS
        </h2>
        
        <form method="POST" action="/login" class="space-y-4">
            @csrf
            <div>
                <label class="text-cyan text-sm font-bold mb-2 block">IDENTITY:</label>
                <input type="email" name="email" placeholder="Enter email address..." 
                       class="w-full p-3 rounded bg-black text-white border border-violet focus:border-cyan focus:outline-none transition-colors">
            </div>
            
            <div>
                <label class="text-cyan text-sm font-bold mb-2 block">ACCESS CODE:</label>
                <input type="password" name="password" placeholder="Enter access code..." 
                       class="w-full p-3 rounded bg-black text-white border border-violet focus:border-cyan focus:outline-none transition-colors">
            </div>
            
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-magenta to-violet hover:from-violet hover:to-cyan rounded text-white font-bold text-lg transform hover:scale-105 transition-all">
                ⚡ CONNECT TO SYSTEM ⚡
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-gray-400 text-sm">New user? 
                <a href="/register" class="text-cyan hover:text-magenta transition-colors">Join the network</a>
            </p>
        </div>
    </div>
</div>
@endsection
