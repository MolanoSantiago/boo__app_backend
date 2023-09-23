<?php

namespace Hex\Shared\Domain\ValueObjects;

class ArrayValueObject
{
    public function __construct(protected array $value)
    {
    }

    public function value(): array
    {
        return $this->value;
    }
}
