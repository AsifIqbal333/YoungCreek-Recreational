<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::name('admin.')->group(function () {
    Route::get('login', LoginController::class)->name('login');
    Route::view('forgot-password', 'admin.auth.passwords.email')->name('password.request');

    Route::middleware([IsAdmin::class])->group(function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');

        // products routes
        Route::resource('products', ProductController::class);

        // orders routes
        Route::resource('orders', OrderController::class);

        // quote requests route
        Route::view('quote-requests', 'admin.quote-requests.index')->name('quote-requests');
        Route::get('quote-requests/{request}', QuoteRequestController::class)->name('quote-requests.show');

        // deals routes
        Route::resource('deals', DealController::class);

        // users routes
        Route::resource('users', UserController::class);

        // Profile Routes
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/update', [ProfileController::class, 'update'])->name('update');
            Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('change-password');
        });
    });

});


require __DIR__ . '/auth.php';
