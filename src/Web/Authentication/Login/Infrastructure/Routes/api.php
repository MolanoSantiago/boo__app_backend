<?php

use Hex\Web\Authentication\Login\Infrastructure\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class)->name('login.web');
