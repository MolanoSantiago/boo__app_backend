<?php

namespace Hex\Shared\Domain\ValueObjects;

use Exception;

abstract class ValueObject
{
    protected string $resource = '';

    abstract public function value();

    public static function make(mixed ...$value): static
    {
        return new static(...$value);
    }

    public static function from(mixed ...$values): static
    {
        return static::make(...$values);
    }

    public function equals(ValueObject $valueObject): bool
    {
        return $this->value() === $valueObject->value();
    }

    public function notEquals(ValueObject $valueObject): bool
    {
        return !$this->equals($valueObject);
    }

    public function toArray(): array
    {
        return (array) $this->value();
    }

    public function toString(): string
    {
        return (string) $this->value();
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @throws Exception
     */
    public function __set(string $name, mixed $value): never
    {
        throw new Exception('Los Value Objects son inmutables. No pueden ser modificados');
    }
}
