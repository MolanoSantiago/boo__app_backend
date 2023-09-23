<?php

namespace Hex\Shared\Domain\ValueObjects;

class BoolValueObject extends ValueObject
{
    public function __construct(protected bool $value)
    {
    }

    public function value(): bool
    {
        return $this->value;
    }

    public function toString(): string
    {
        return $this->value ? 'true' : 'false';
    }
}
