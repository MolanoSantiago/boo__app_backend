<?php

namespace Hex\Web\Authentication\Login\Application\Post;

use Hex\Shared\Domain\Constants\ExceptionMessages;
use Hex\Shared\Domain\Constants\HttpCodes;
use Hex\Shared\Domain\Contracts\LoggerInterface;
use Hex\Shared\Domain\Exceptions\CustomException;
use Hex\Web\Authentication\Login\Domain\Contracts\LoginRepositoryInterface;
use Hex\Web\Authentication\Login\Domain\Login;
use Hex\Web\Shared\ValueObjects\Email;
use Hex\Web\Shared\ValueObjects\Password;

final class LoginUseCase
{
    public function __construct(
        private readonly LoginRepositoryInterface $repository,
        private readonly LoggerInterface $logger
    )
    {
        // Intentionally not implement
    }

    /**
     * @throws CustomException
     */
    public function __invoke(string $email, string $password): ?array
    {
        $response = $this->repository->login(new Login(new Email($email), new Password($password)));

        if (!$response) {
            throw new CustomException(ExceptionMessages::INVALID_CREDENTIALS, HttpCodes::HTTP_UNAUTHORIZED);
        }
        $this->logger->info("[WEB][AUTHENTICATION][LOGIN][EMAIL:$email]: has successfully logged in.");

        return $response;
    }
}
