<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Welcome'], Response::HTTP_OK);
});

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users-route');

Route::get('/users/{userId}', [\App\Http\Controllers\UserController::class, 'show']);

Route::post('/users', [\App\Http\Controllers\UserController::class, 'create'])->name('create-user');

Route::group(['prefix' => 'posts'], function() {
    Route::get('/page', function() {
        return redirect()->route('users-route');
    });
});


Route::get('/user/{name}', function ($name) {
    //
})->where('name', '[A-Za-z]+');

Route::get('/user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');

Route::get('/user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*');
