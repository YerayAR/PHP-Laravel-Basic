<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

/**
 * Middleware that verifies Cross-Site Request Forgery tokens on incoming
 * requests. It protects the application from CSRF attacks.
 */
class VerifyCsrfToken extends Middleware
{
    /**
     * URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Add routes here to disable CSRF protection for them
    ];
}
