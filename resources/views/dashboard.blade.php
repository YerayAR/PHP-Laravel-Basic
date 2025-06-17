{{-- User dashboard view --}}
@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2 class="text-cyan text-3xl mb-6">Welcome, {{ $user->name }}</h2>
    <form method="POST" action="/dashboard" class="max-w-md mx-auto bg-gray-800 bg-opacity-50 p-6 rounded-lg">
        @csrf
        <label class="block mb-2 text-left">Name
            <input type="text" name="name" value="{{ $user->name }}" class="w-full p-2 rounded bg-black text-white bg-opacity-50">
        </label>
        <button type="submit" class="mt-4 w-full py-2 bg-magenta hover:bg-violet rounded text-black font-bold">Update Profile</button>
    </form>
</div>
@endsection
