<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\OrderController;

// routes/web.php (Line 10)
// Use the imported class reference

Route::get('/get-started', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('dashboard')
            : redirect()->route('user.index');
    }

    return redirect()->route('login');
})->name('get-started');

Route::get('/contact', [ContactController::class, 'showForm'])->name('user.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/redirects', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('user.index');
    })->name('redirects');

    Route::get('/', [HomeController::class, 'index'])->name('user.index');
    Route::get('/shop', [ShopController::class, 'index'])->name('user.shop');
    Route::middleware(['auth'])->group(function () {
    // ...
    Route::get('/profile', [ProfileController::class, 'show'])->name('user.profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('user.profile.update');
    // ...
});
    Route::get('/about', function () {
        return view('user.about.about');
    })->name('user.about');
});
Route::post('/orders',[OrderController::class, 'store'])->middleware(['auth', 'verified'])->name('orders.store');
Route::middleware(['auth', 'verified', 'role'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('orders', \App\Http\Controllers\OrderController::class)->except([
    'store'
]);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('users', UserController::class);

    Route::get('messages', [ContactController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [ContactController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [ContactController::class, 'destroy'])->name('messages.destroy');
    
    Route::delete('products/{product}/destroyImage/{image}', [ProductController::class, 'destroyImage'])->name('products.destroyImage');
});



require __DIR__ . '/settings.php';
