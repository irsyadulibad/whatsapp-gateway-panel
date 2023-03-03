<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('sessions', SessionController::class);
Route::prefix('messages')
    ->controller(MessageController::class)
    ->name('messages.')
    ->group(function () {
        Route::get('{session}/send', 'compose')->name('compose');
        Route::post('{session}/send', 'send')->name('send');
    });
Route::resource('messages', MessageController::class);
