<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/event/view/{slug}', [EventController::class, 'view'])->name('event.view');

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('user')->group(function() {
        Route::get('event/attend/{slug}', [EventController::class, 'attendEvent'])->name('event.attend');
        Route::get('events/attending', [EventController::class, 'userRegisteredEvents'])->name('events.attending');
        Route::get('events/decline/{slug}', [EventController::class, 'declineEvent'])->name('event.decline');
    });

    Route::middleware('can:admin-only')->prefix('admin')->group(function() {
        Route::get('events', [EventController::class, 'adminIndex'])->name('admin.events');
        Route::get('events/registered', [EventController::class, 'registered'])->name('events.registered');
        Route::post('event/store', [EventController::class, 'store'])->name('event.store');

        Route::get('users', [UserController::class, 'index'])->name('users');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    });
});
