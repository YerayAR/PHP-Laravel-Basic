<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

/**
 * Middleware that ensures the user is authenticated.
 *
 * If the user is not authenticated, they will be redirected to the login
 * route when accessing web requests (non-JSON).
 */
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not
     * authenticated.
     */
    protected function redirectTo($request)
    {
        // For non-JSON requests, redirect to the login route.
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
