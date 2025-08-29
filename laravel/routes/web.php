<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('products');
});

Route::post('/api/import', [App\Http\Controllers\Api\ImportController::class, 'import']);

// Keep the old route for backward compatibility, but redirect to main page
Route::get('/view/products', function () {
    return redirect('/');
});
