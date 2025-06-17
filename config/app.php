<?php

/**
 * Base configuration values for the Laravel application.
 */

return [
    // The name of the application used in views and console outputs.
    'name' => env('APP_NAME', 'CyberpunkApp'),

    // Current environment: production, local, etc.
    'env' => env('APP_ENV', 'production'),

    // Enable or disable debug mode.
    'debug' => (bool) env('APP_DEBUG', false),

    // Base URL for generating links.
    'url' => env('APP_URL', 'http://localhost'),

    // Default timezone and locale used by Carbon and translations.
    'timezone' => 'UTC',
    'locale' => 'en',
];
