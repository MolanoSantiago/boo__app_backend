<?php

namespace Hex\Shared\Domain\Contracts;

interface MessagingInterface
{
    public function send(string $message, string|array $recipients): string;
}
