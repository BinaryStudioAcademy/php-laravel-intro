<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('photos', [\App\Http\Controllers\PhotoController::class, 'all']);
Route::get('photos/{id}', [\App\Http\Controllers\PhotoController::class, 'getById']);
