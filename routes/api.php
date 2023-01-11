<?php

use Astlaure\Saphir\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

$configuration = [
    'prefix' => config('saphir.api.prefix'),
    'middleware' => config('saphir.api.middleware'),
];

Route::group($configuration, function() {
    Route::get('/users', [UserController::class, 'getUsers']);
    Route::get('/users/{id}', [UserController::class, 'getUserById']);
    Route::post('/users', [UserController::class, 'postUser']);
    Route::put('/users/{id}', [UserController::class, 'putUser']);
    Route::patch('/users/{id}', [UserController::class, 'patchUserPassword']);
    Route::delete('/users/{id}', [UserController::class, 'deleteUser']);
});
