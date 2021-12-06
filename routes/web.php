<?php

use App\Events\OnEventClick;
use App\Models\User;
use App\Notifications\InvoicePaid;
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

Route::get('/notification', function () {
    $user = User::where('id', 1)->firstOrFail();

    $invoice = new \App\Models\Invoice();
    $invoice->save();

    $user->notify(new InvoicePaid($invoice));
});

Route::get('/event', function () {
    $user = User::where('id', 1)->firstOrFail();

    $invoice = new \App\Models\Invoice();
    $invoice->save();

    OnEventClick::dispatch($invoice, $user);
});
