
<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');

    Route::view('/login', 'auth.login')
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [BookController::class, 'index'])
        ->name('dashboard');

    Route::get('/books/create', [BookController::class, 'create'])
        ->name('books.create');

    Route::post('/books', [BookController::class, 'store'])
        ->name('books.store');


    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
