<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('users')->group(function () {
    Route::post('/', [UserController::class, 'create'])->name('user.create');
    Route::delete('/{user}', [UserController::class, 'remove'])->name('user.remove');
    Route::patch('/{user}', [UserController::class, 'update'])->name('user.update');
    Route::post('/forgot-password', [UserController::class, 'forgotPassword'])->name('user.forgot-password');
    Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('user.reset-password');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

