<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

/**
 * Global exception handler for the application.
 *
 * Here we can customize how exceptions are reported or rendered. The class
 * extends Laravel's base handler which provides sensible defaults.
 */
class Handler extends ExceptionHandler
{
    /**
     * Exceptions that should not be reported to the log or error tracker.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [];

    /**
     * Register exception handling callbacks.
     */
    public function register(): void
    {
        // Example of a closure used to report specific exceptions.
        $this->reportable(function (Throwable $e) {
            // Custom reporting logic can be placed here.
        });
    }
}
