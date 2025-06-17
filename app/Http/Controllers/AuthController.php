<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Controller responsible for user authentication and registration flows.
 */
class AuthController extends Controller
{
    /**
     * Display the login form.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle the login POST request.
     *
     * Validates the credentials and attempts to authenticate the user. On
     * success the session is regenerated to prevent fixation and the user is
     * redirected to their intended destination.
     */
    public function login(Request $request)
    {
        // Validate input credentials.
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt authentication with the provided credentials.
        if (Auth::attempt($credentials)) {
            // Regenerate the session ID to secure the session.
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Authentication failed; return back with an error message.
        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    /**
     * Display the registration form.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        // Validate the submitted data.
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Hash the password and set a default role.
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';

        // Create the user and log them in immediately.
        $user = User::create($data);
        Auth::login($user);

        return redirect('/dashboard');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate and regenerate the session to clear authentication data.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
