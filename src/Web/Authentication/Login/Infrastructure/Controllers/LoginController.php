<?php

namespace Hex\Web\Authentication\Login\Infrastructure\Controllers;

use Hex\Shared\Domain\Constants\HttpCodes;
use Hex\Shared\Domain\Exceptions\CustomException;
use Hex\Web\Authentication\Login\Application\Post\LoginUseCase;
use Hex\Web\Authentication\Login\Infrastructure\Requests\LoginRequest;
use Hex\Web\Authentication\Login\Infrastructure\Resources\LoginResource;

final class LoginController
{
    public function __construct(private readonly LoginUseCase $loginUseCase)
    {
        // Intentionally not implement
    }

    /**
     * @throws CustomException
     */
    public function __invoke(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $login = $this->loginUseCase->__invoke($request->email, $request->password);

        return LoginResource::make($login)->response()->setStatusCode(HttpCodes::HTTP_OK);
    }
}
