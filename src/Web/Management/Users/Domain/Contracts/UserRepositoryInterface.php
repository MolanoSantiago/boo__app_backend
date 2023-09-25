<?php

namespace Hex\Web\Management\Users\Domain\Contracts;

use App\Models\User;
use Hex\Web\Management\Users\Domain\User as UserEntity;

interface UserRepositoryInterface
{
    public function save(UserEntity $user): ?User;
}
