<?php

namespace Hex\Web\Shared\ValueObjects;

use Hex\Shared\Domain\ValueObjects\StringValueObject;

class Password extends StringValueObject
{
    protected string $resource = 'password';

    public function isEquals(string $anotherPassword ): bool
    {
        return password_verify($this->value(), $anotherPassword);
    }
}
