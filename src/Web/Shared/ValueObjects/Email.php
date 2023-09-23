<?php

namespace Hex\Web\Shared\ValueObjects;

use Hex\Shared\Domain\ValueObjects\StringValueObject;

class Email extends StringValueObject
{
    protected string $resource = 'email';
}
