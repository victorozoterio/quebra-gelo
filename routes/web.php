<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rotas públicas de autenticação
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

// Rota de registro
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// Rotas protegidas com middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Rota para a página inicial com a lista de usuários
    Route::get('/', [UserController::class, 'home'])->name('user.home');

    // Rota de logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
