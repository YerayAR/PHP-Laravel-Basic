{{-- List view for all nodes --}}
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-cyan text-4xl font-bold glitch">
            <span class="pulse-slow">🌐</span> NETWORK NODES MATRIX
        </h2>
        <a href="{{ route('nodes.create') }}" class="bg-gradient-to-r from-magenta to-violet hover:from-violet hover:to-cyan text-white px-6 py-3 rounded-lg font-bold transform hover:scale-105 transition-all">
            + DEPLOY NEW NODE
        </a>
    </div>
    
    @if($nodes->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($nodes as $node)
            <div class="card neon-border hover:scale-105 transform transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-magenta text-xl font-bold">{{ $node->name }}</h3>
                    <span class="text-green-400 pulse-slow">● ONLINE</span>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span class="text-cyan text-sm">IP ADDRESS:</span>
                        <span class="text-white font-mono">{{ $node->ip_address }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-cyan text-sm">STATUS:</span>
                        <span class="text-green-400">ACTIVE</span>
                    </div>
                    @if($node->description)
                    <div class="mt-3">
                        <span class="text-cyan text-sm block mb-1">DESCRIPTION:</span>
                        <p class="text-gray-300 text-sm">{{ $node->description }}</p>
                    </div>
                    @endif
                </div>
                
                <div class="flex space-x-2">
                    <a href="{{ route('nodes.edit', $node) }}" 
                       class="flex-1 bg-violet hover:bg-magenta text-white px-3 py-2 rounded text-center text-sm font-bold transition-colors">
                        ⚙️ CONFIG
                    </a>
                    <form method="POST" action="{{ route('nodes.destroy', $node) }}" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Terminate node {{ $node->name }}?')"
                                class="w-full bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm font-bold transition-colors">
                            🗑️ TERMINATE
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="card neon-border text-center py-12">
            <h3 class="text-magenta text-2xl mb-4">🔍 NO NODES DETECTED</h3>
            <p class="text-gray-400 mb-6">The network matrix is empty. Deploy your first node to begin monitoring.</p>
            <a href="{{ route('nodes.create') }}" 
               class="bg-gradient-to-r from-cyan to-magenta hover:from-magenta hover:to-violet text-white px-8 py-3 rounded-lg font-bold transform hover:scale-105 transition-all">
                🚀 DEPLOY FIRST NODE
            </a>
        </div>
    @endif
</div>
@endsection
