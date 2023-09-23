<?php

namespace Hex\Web\Authentication\Login\Infrastructure\Controllers;

use Hex\Shared\Domain\Constants\HttpCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

final class LogoutController
{
    public function __invoke(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Se ha cerrado sesión correctamente.'
        ], HttpCodes::HTTP_OK);
    }
}
