<?php

namespace Hex\Shared\Domain\ValueObjects;

class IntValueObject extends ValueObject
{
    public function __construct(protected int $value)
    {
        $this->validate();
    }

    public function value(): int
    {
        return $this->value;
    }

    protected function validate(): void
    {
        if (!is_numeric($this->value)) {
            throw new \InvalidArgumentException("El campo {$this->resource} no es un numero entero");
        }

        if ($this->value < 0) {
            throw new \InvalidArgumentException("El campo {$this->resource} no puede ser negativo");
        }
    }
}
