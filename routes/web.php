<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index'])->name('home');

// Auth Routes
Route::get('/loginPage', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// User Routes
Route::middleware([UserMiddleware::class])->group(function () {
    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('cart/view', [CartController::class, 'view'])->name('cart.view');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
    Route::post('/order/add', [OrderController::class, 'add'])->name('order.add');
});

// Admin Routes
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/orders/view', [OrderController::class, 'view'])->name('orders.view');

});
