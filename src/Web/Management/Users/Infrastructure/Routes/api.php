<?php

use Hex\Web\Management\Users\Infrastructure\Controllers\SaveUserController;
use Illuminate\Support\Facades\Route;

Route::post('/signup', SaveUserController::class)->name('signup');
