<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;

// generate access token:
// make POST request to /oauth/token route
// form data
// grant_type - password
// client_id - 2
// client_secret - [secret column in oauth_clients table]
// username - [user's email]
// password - [user's password]
// scope - [empty]

// Following headers should be inside HTTP requests:
// Accept - application/json
// Authorization - Bearer [access_token]

Route::middleware('auth:api')->prefix('v1')->group(function() {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });

    // Route::get('/authors', [AuthorsController::class, 'index']);

    // Route::get('/authors/{author}', [AuthorsController::class, 'show']);

    // or

    Route::apiResource('/authors', AuthorsController::class);

    Route::apiResource('/books', BooksController::class);
});
