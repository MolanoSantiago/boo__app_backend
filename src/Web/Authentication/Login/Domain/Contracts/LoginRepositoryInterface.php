<?php

namespace Hex\Web\Authentication\Login\Domain\Contracts;

use Hex\Web\Authentication\Login\Domain\Login;

interface LoginRepositoryInterface
{
    public function login(Login $login): ?array;
}
