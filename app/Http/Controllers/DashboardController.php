<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller for handling the user dashboard and profile updates.
 */
class DashboardController extends Controller
{
    /**
     * Display the dashboard for the authenticated user.
     */
    public function index()
    {
        // Retrieve the currently authenticated user instance.
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    /**
     * Update the authenticated user's profile details.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming data.
        $data = $request->validate([
            'name' => 'required',
        ]);

        // Persist the new name to the database.
        $user->update($data);

        return back()->with('status', 'Profile updated');
    }
}
