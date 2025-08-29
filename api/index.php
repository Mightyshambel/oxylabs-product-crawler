<?php

// Vercel serverless function entry point for Laravel
require_once __DIR__ . '/../laravel/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/../laravel/bootstrap/app.php';

// Run the application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
