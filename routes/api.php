<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
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

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'getList'])->name('product.get-list');
    Route::post('/', [ProductController::class, 'create'])->name('product.create');
    Route::patch('/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{product}', [ProductController::class, 'remove'])->name('product.remove');
});

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'getList'])->name('product.get-list');
    Route::get('/{order}', [OrderController::class, 'getFromId'])->name('product.get-from-id');
    Route::post('/', [OrderController::class, 'create'])->name('product.create');
    Route::patch('/{order}', [OrderController::class, 'update'])->name('product.update');
    Route::delete('/{order}', [OrderController::class, 'remove'])->name('product.remove');
});

Route::prefix('sales')->group(function () {
    Route::get('/', [SaleController::class, 'getList'])->name('sale.get-list');
    Route::post('/', [SaleController::class, 'create'])->name('sale.create');
    Route::delete('/{sale}', [SaleController::class, 'remove'])->name('sale.remove');
});

