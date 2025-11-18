<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// ----------------- HOME -----------------
Route::get('/', function () {
    return view('welcome');
});

// ----------------- AUTH (LOGIN & LOGOUT) -----------------
Route::get('/login', [UserController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [UserController::class, 'authenticate'])
    ->name('login.process');

Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ----------------- USER ROUTES -----------------
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])
        ->name('user.dashboard');

    Route::get('/profile', [UserController::class, 'profile'])
        ->name('user.profile');

    Route::put('/profile/update', [UserController::class, 'profileUpdate'])
        ->name('user.profile.update');
});

// ----------------- ADMIN ROUTES -----------------
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/users', [AdminController::class, 'users'])
            ->name('users');

        Route::get('/users/{user}', [AdminController::class, 'userShow'])
            ->name('users.show');

        Route::get('/users/{user}/edit', [AdminController::class, 'userEdit'])
            ->name('users.edit');

        Route::put('/users/{user}', [AdminController::class, 'userUpdate'])
            ->name('users.update');

        Route::delete('/users/{user}', [AdminController::class, 'userDelete'])
            ->name('users.delete');
    });

Route::get('/register', function () {
    return view('auth.register');
})->name('register');



Route::post('/register', [AuthController::class, 'register'])->name('register.post');

