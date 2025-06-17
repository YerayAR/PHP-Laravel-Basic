<?php

/**
 * Creates the Laravel application instance and binds the core interfaces.
 *
 * This file is included by both the web and console entry points to
 * bootstrap the application and return the fully configured container.
 */

// Instantiate the main application object. The base path is resolved from the
// environment or defaults to the parent directory.
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// Bind the HTTP kernel implementation.
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

// Bind the console kernel implementation.
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

// Bind the exception handler implementation.
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// Return the configured application instance for use by the callers.
return $app;
