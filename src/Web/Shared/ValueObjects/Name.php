<?php

namespace Hex\Web\Shared\ValueObjects;

use Hex\Shared\Domain\ValueObjects\StringValueObject;

class Name extends StringValueObject
{
    protected string $resource = 'name';
}
