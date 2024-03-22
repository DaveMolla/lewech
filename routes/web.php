<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemRequestController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserNotificationController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::post('/items/{item}/request', [ItemRequestController::class, 'store'])->name('items.request');
    Route::get('/my-requests', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::get('/notifications', [UserNotificationController::class, 'index'])->name('notifications.index');
    Route::get('/dashboard', [ItemController::class, 'myItems'])->name('dashboard');

});

Route::get('/items/{item}/request', [ItemRequestController::class, 'create'])->name('requests.create')->middleware('auth');

Route::post('/requests', [ItemRequestController::class, 'store'])->name('requests.store')->middleware('auth');

Route::get('/feed', [ItemController::class, 'feed'])->name('feed');



