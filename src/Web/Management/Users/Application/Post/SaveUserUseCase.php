<?php

namespace Hex\Web\Management\Users\Application\Post;

use App\Models\User as UserModel;
use Hex\Shared\Domain\Constants\ExceptionMessages;
use Hex\Shared\Domain\Constants\HttpCodes;
use Hex\Shared\Domain\Contracts\LoggerInterface;
use Hex\Shared\Domain\Exceptions\CustomException;
use Hex\Web\Management\Users\Domain\Contracts\UserRepositoryInterface;
use Hex\Web\Management\Users\Domain\User as UserEntity;
use Hex\Web\Shared\ValueObjects\Email;
use Hex\Web\Shared\ValueObjects\Name;
use Hex\Web\Shared\ValueObjects\Password;
use Hex\Web\Shared\ValueObjects\Surname;

final class SaveUserUseCase
{
    public function __construct(
        private readonly UserRepositoryInterface $repository,
        private readonly LoggerInterface         $logger,
    )
    {
        // Intentionally not implement
    }

    /**
     * @throws CustomException
     */
    public function __invoke(array $request): ?UserModel
    {
        $name = $request['name'];
        $surname = $request['surname'];
        $email = $request['email'];
        $password = $request['password'];

        $user = $this->repository->save(new UserEntity(
            new Name($name),
            new Surname($surname),
            new Email($email),
            new Password($password)
        ));

        if (is_null($user)) throw new CustomException(ExceptionMessages::ERROR_USER_SAVE, HttpCodes::HTTP_INTERNAL_SERVER_ERROR);

        $this->logger->info("[WEB][MANAGEMENT][USER:$name]: was successfully saved");

        return $user;
    }
}
