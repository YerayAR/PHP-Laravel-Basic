<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NodeController extends Controller
{
    public function index()
    {
        $nodes = Node::all();
        return view('nodes.index', compact('nodes'));
    }

    public function create()
    {
        return view('nodes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ip_address' => 'required',
        ]);
        Node::create($request->all());
        return redirect()->route('nodes.index');
    }

    public function edit(Node $node)
    {
        return view('nodes.edit', compact('node'));
    }

    public function update(Request $request, Node $node)
    {
        $request->validate([
            'name' => 'required',
            'ip_address' => 'required',
        ]);
        $node->update($request->all());
        return redirect()->route('nodes.index');
    }

    public function destroy(Node $node)
    {
        $node->delete();
        return redirect()->route('nodes.index');
    }
}
