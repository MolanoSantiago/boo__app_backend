<?php

namespace Hex\Web\Authentication\Login\Domain;

use Hex\Web\Shared\ValueObjects\Email;
use Hex\Web\Shared\ValueObjects\Password;

final class Login
{
    public function __construct(
        private readonly Email $email,
        private readonly Password $password
    )
    {
        // Intentionally not implement
    }

    public function getEmail(): string
    {
        return $this->email->value();
    }

    public function getPassword(): string
    {
        return $this->password->value();
    }

    public function passwordMatches(string $password): bool
    {
        return $this->password->isEquals($password);
    }
}
