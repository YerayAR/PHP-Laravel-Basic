<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// Mark the start time of the application for performance measurement.
define('LARAVEL_START', microtime(true));

// Composer autoloader for all project dependencies.
require __DIR__.'/../vendor/autoload.php';

// Bootstrap the Laravel application and obtain the service container instance.
$app = require_once __DIR__.'/../bootstrap/app.php';

// Resolve the HTTP kernel which handles incoming requests.
$kernel = $app->make(Kernel::class);

// Capture the incoming HTTP request and send it through the kernel, obtaining
// the response instance which is then sent back to the client.
$response = $kernel->handle(
    $request = Request::capture()
)->send();

// Perform any final tasks required after the response has been sent.
$kernel->terminate($request, $response);
