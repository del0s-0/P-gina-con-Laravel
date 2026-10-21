<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/users', [usercontroller::class, 'index'])->name('users');
    Route::get('/users/create', [usercontroller::class, 'create'])->name('users.create');
    Route::post('/users', [usercontroller::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [usercontroller::class, 'destroy'])->name('users.destroy');
});
