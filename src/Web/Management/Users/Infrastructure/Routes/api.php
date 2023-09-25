<?php

use Hex\Shared\Domain\Constants\HttpCodes;
use Hex\Web\Management\Users\Infrastructure\Controllers\SaveUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Email verification handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return response()->json(['message' => 'Email verificado correctamente'], HttpCodes::HTTP_OK);
})->middleware(['auth:sanctum', 'signed'])->name('verification.verify');

// Resending the verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:sanctum', 'throttle:6,1'])->name('verification.send');

Route::post('/signup', SaveUserController::class)->name('signup');
