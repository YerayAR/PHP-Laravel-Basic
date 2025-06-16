@extends('layouts.app')

@section('content')
<h2 class="text-cyan text-2xl mb-4">Add Node</h2>
<form method="POST" action="{{ route('nodes.store') }}" class="max-w-md mx-auto bg-gray-800 bg-opacity-50 p-6 rounded">
    @csrf
    <input type="text" name="name" placeholder="Name" class="w-full mb-3 p-2 rounded bg-black text-white bg-opacity-50">
    <input type="text" name="ip_address" placeholder="IP Address" class="w-full mb-3 p-2 rounded bg-black text-white bg-opacity-50">
    <textarea name="description" placeholder="Description" class="w-full mb-3 p-2 rounded bg-black text-white bg-opacity-50"></textarea>
    <button type="submit" class="w-full py-2 bg-magenta hover:bg-violet rounded text-black font-bold">Save</button>
</form>
@endsection
