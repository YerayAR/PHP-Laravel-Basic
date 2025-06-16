@extends('layouts.app')

@section('content')
<h2 class="text-cyan text-2xl mb-4">Edit Node</h2>
<form method="POST" action="{{ route('nodes.update', $node) }}" class="max-w-md mx-auto bg-gray-800 bg-opacity-50 p-6 rounded">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $node->name }}" class="w-full mb-3 p-2 rounded bg-black text-white bg-opacity-50">
    <input type="text" name="ip_address" value="{{ $node->ip_address }}" class="w-full mb-3 p-2 rounded bg-black text-white bg-opacity-50">
    <textarea name="description" class="w-full mb-3 p-2 rounded bg-black text-white bg-opacity-50">{{ $node->description }}</textarea>
    <button type="submit" class="w-full py-2 bg-magenta hover:bg-violet rounded text-black font-bold">Update</button>
</form>
@endsection
