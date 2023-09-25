<?php

namespace Hex\Web\Management\Users\Infrastructure\Controllers;

use Hex\Shared\Domain\Constants\HttpCodes;
use Hex\Shared\Domain\Exceptions\CustomException;
use Hex\Web\Management\Users\Application\Post\SaveUserUseCase;
use Hex\Web\Management\Users\Infrastructure\Requests\UserRequest;
use Hex\Web\Management\Users\Infrastructure\Resources\SaveUserResource;
use Illuminate\Http\JsonResponse;

final class SaveUserController
{
    public function __construct(private readonly SaveUserUseCase $useCase)
    {
        // Intentionally not implement
    }

    /**
     * @throws CustomException
     */
    public function __invoke(UserRequest $request): JsonResponse
    {
        $user = $this->useCase->__invoke($request->toArray());

        return SaveUserResource::make($user)->response()->setStatusCode(HttpCodes::HTTP_CREATED);
    }
}
