<?php

namespace Hex\Web\Management\Users\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\User;
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

        if ($existingUser) return null;

        $newUser = $this->model->create($user->handler());

        if (!$newUser) return null;

        $newUser->load('userType:id,name');

        return $newUser;
    }

    private function findUserByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }
}
