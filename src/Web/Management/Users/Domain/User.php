<?php

namespace Hex\Web\Management\Users\Domain;

use Hex\Web\Shared\ValueObjects\Email;
use Hex\Web\Shared\ValueObjects\Name;
use Hex\Web\Shared\ValueObjects\Password;
use Hex\Web\Shared\ValueObjects\Surname;
use Hex\Web\Shared\ValueObjects\UserTypeId;

final class User
{
    private array $handler;

    public function __construct(
        private readonly Name        $name,
        private readonly Surname     $surname,
        private readonly Email       $email,
        private readonly Password    $password,
        private readonly ?UserTypeId $userTypeId = new UserTypeId(3)
    )
    {
        $this->handler = [
            "name" => $this->getName(),
            "surname" => $this->getSurname(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword(),
            "user_type_id" => $this->getUserTypeId()
        ];
    }

    private function getName(): string
    {
        return $this->name->value();
    }

    private function getSurname(): string
    {
        return $this->surname->value();
    }

    public function getEmail(): string
    {
        return $this->email->value();
    }

    private function getPassword(): string
    {
        return $this->password->value();
    }

    private function getUserTypeId(): int
    {
        return $this->userTypeId->value();
    }

    public function handler(): array
    {
        return $this->handler;
    }
}
