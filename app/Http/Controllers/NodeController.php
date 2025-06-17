<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller providing CRUD operations for network nodes.
 */
class NodeController extends Controller
{
    /**
     * Display a listing of all nodes.
     */
    public function index()
    {
        // Retrieve every node record from the database.
        $nodes = Node::all();
        return view('nodes.index', compact('nodes'));
    }

    /**
     * Show the form for creating a new node.
     */
    public function create()
    {
        return view('nodes.create');
    }

    /**
     * Store a newly created node in the database.
     */
    public function store(Request $request)
    {
        // Validate user input before persisting.
        $request->validate([
            'name' => 'required',
            'ip_address' => 'required',
        ]);

        // Create the node using all request data.
        Node::create($request->all());

        return redirect()->route('nodes.index');
    }

    /**
     * Show the form for editing the specified node.
     */
    public function edit(Node $node)
    {
        return view('nodes.edit', compact('node'));
    }

    /**
     * Update the specified node in storage.
     */
    public function update(Request $request, Node $node)
    {
        $request->validate([
            'name' => 'required',
            'ip_address' => 'required',
        ]);

        // Apply the updates from the request.
        $node->update($request->all());

        return redirect()->route('nodes.index');
    }

    /**
     * Remove the specified node from storage.
     */
    public function destroy(Node $node)
    {
        $node->delete();
        return redirect()->route('nodes.index');
    }
}
