<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/redirects', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('user.dashboard');
    })->name('redirects');

    Route::get('/user/dashboard', function () {
        return view('user.index');
    })->name('user.dashboard');
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
