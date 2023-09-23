<?php

namespace Hex\Shared\Domain\ValueObjects;

use Hex\Shared\Domain\Constants\HttpCodes;

class StringValueObject extends ValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = trim($value);
        $this->validate();
    }

    public function value(): string
    {
        return $this->value;
    }

    protected function validate(): void
    {
        if (empty($this->value)) {
            throw new \InvalidArgumentException("El campo {$this->resource} no puede estar vacio", HttpCodes::HTTP_BAD_REQUEST);
        }

        if ($this->value === null) {
            throw new \InvalidArgumentException("El campo {$this->resource} no puede ser null", HttpCodes::HTTP_BAD_REQUEST);
        }
    }
}
