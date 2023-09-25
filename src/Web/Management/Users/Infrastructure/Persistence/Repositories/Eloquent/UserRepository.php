<?php

namespace Hex\Web\Management\Users\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\User;
use Hex\Shared\Domain\Constants\ExceptionMessages;
use Hex\Shared\Domain\Constants\HttpCodes;
use Hex\Shared\Domain\Exceptions\CustomException;
use Hex\Web\Management\Users\Domain\Contracts\UserRepositoryInterface;
use Hex\Web\Management\Users\Domain\User as UserEntity;

class UserRepository implements UserRepositoryInterface
{
    private User $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * @throws CustomException
     */
    public function save(UserEntity $user): ?User
    {
        $existingUser = $this->findUserByEmail($user->getEmail());

        if ($existingUser) throw new CustomException(ExceptionMessages::ERROR_USER_UNIQUE, HttpCodes::HTTP_BAD_REQUEST);

        $newUser = $this->model->create($user->handler());

        return ($newUser) ?: null;
    }

    private function findUserByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }
}
