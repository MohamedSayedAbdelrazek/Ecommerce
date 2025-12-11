<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\user\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/get-started', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('dashboard')
            : redirect()->route('user.index');
    }

    return redirect()->route('login');
})->name('get-started');

Route::middleware(['auth'])->group(function () {
    Route::get('/redirects', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('user.index');
    })->name('redirects');

    Route::get('/user', [CustomerController::class, 'index'])->name('user.index');
    Route::get('/about', function () {
        return view('user.about.about');
    })->name('user.about');
});

Route::middleware(['auth', 'verified', 'role'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('orders', \App\Http\Controllers\OrderController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('users', UserController::class);
    Route::delete('products/{product}/destroyImage/{image}', [ProductController::class, 'destroyImage'])->name('products.destroyImage');
});



require __DIR__ . '/settings.php';
