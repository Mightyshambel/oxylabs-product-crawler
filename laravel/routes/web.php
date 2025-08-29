<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/import', [App\Http\Controllers\Api\ImportController::class, 'import']);
