{{-- List view for all nodes --}}
@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-cyan text-2xl">Network Nodes</h2>
    <a href="{{ route('nodes.create') }}" class="bg-magenta text-black px-4 py-2 rounded hover:bg-violet">Add Node</a>
</div>
<table class="w-full bg-gray-800 bg-opacity-50 rounded">
    <thead>
        <tr class="text-left">
            <th class="p-2">Name</th>
            <th class="p-2">IP</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nodes as $node)
        <tr class="border-t border-gray-700">
            <td class="p-2">{{ $node->name }}</td>
            <td class="p-2">{{ $node->ip_address }}</td>
            <td class="p-2">
                <a href="{{ route('nodes.edit', $node) }}" class="text-magenta mr-2">Edit</a>
                <form method="POST" action="{{ route('nodes.destroy', $node) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
