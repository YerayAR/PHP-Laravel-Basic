@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-gray-800 bg-opacity-50 p-6 rounded-lg shadow-lg">
    <h2 class="text-magenta text-2xl mb-4">Login</h2>
    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full mb-3 p-2 rounded bg-black text-white bg-opacity-50">
        <input type="password" name="password" placeholder="Password" class="w-full mb-3 p-2 rounded bg-black text-white bg-opacity-50">
        <button type="submit" class="w-full py-2 bg-magenta hover:bg-violet rounded text-black font-bold">Login</button>
    </form>
</div>
@endsection
