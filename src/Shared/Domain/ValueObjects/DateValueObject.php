<?php

namespace Hex\Shared\Domain\ValueObjects;

class DateValueObject extends ValueObject
{
    public function __construct(protected string $value)
    {
        $this->validate();
    }

    public function value(): string
    {
        return $this->value;
    }

    // is major than
    public function isMajorThan(DateValueObject $date): bool
    {
        return $this->value > $date->value();
    }

    // is minor than
    public function isMinorThan(DateValueObject $date): bool
    {
        return $this->value < $date->value();
    }

    // is equal than
    public function isEqualThan(DateValueObject $date): bool
    {
        return $this->value == $date->value();
    }

    // is major or equal than
    public function isMajorOrEqualThan(DateValueObject $date): bool
    {
        return $this->value >= $date->value();
    }

    // is minor or equal than
    public function isMinorOrEqualThan(DateValueObject $date): bool
    {
        return $this->value <= $date->value();
    }

    // is between
    public function isBetween(DateValueObject $date1, DateValueObject $date2): bool
    {
        return $this->isMajorOrEqualThan($date1) && $this->isMinorOrEqualThan($date2);
    }

    // is not between
    public function isNotBetween(DateValueObject $date1, DateValueObject $date2): bool
    {
        return !$this->isBetween($date1, $date2);
    }

    protected function validate(): void
    {
        if (!is_string($this->value)) {
            throw new \InvalidArgumentException("El campo {$this->resource} no es una cadena de texto");
        }

        if (empty($this->value)) {
            throw new \InvalidArgumentException("El campo {$this->resource} no puede estar vacio");
        }

        // validate date format YYYY-MM-DD HH:MM:SS
        if (!preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $this->value)) {
            throw new \InvalidArgumentException("El campo {$this->resource} no tiene el formato correcto");
        }
    }
}
