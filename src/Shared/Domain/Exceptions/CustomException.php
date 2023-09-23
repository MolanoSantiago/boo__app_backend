<?php

namespace Hex\Shared\Domain\Exceptions;

use Exception;
use Throwable;

class CustomException extends Exception
{
    public function __construct(string $message = "", int $httpCode = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $httpCode, $previous);
    }

    public function toException(): array
    {
        // $classTemporally = new \ReflectionClass(get_class($this));
        // $class = explode('\\', $classTemporally->getName());
        return [
            'status'  => $this->getCode(),
            'errors'  => true,
            //'class' => end($class), // Get the last element of the array
            'message' => $this->getMessage()
        ];
    }
}
