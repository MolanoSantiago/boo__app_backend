<?php

use Hex\Web\Authentication\Login\Infrastructure\Controllers\LoginController;
use Hex\Web\Authentication\Login\Infrastructure\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class)->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', LogoutController::class)->name('logout');
});
