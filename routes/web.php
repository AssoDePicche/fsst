<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\RequireUserLogout;

use Illuminate\Support\Facades\Route;

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware([RequireUserLogout::class])->group(function () {
    Route::get('/', function () {
        return view('login');
    });

    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::get('/register', function () {
        return view('register');
    });

    Route::post('/register', [UserController::class, 'store'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    Route::resource('transactions', TransactionController::class);

    Route::resource('users', UserController::class);
});
