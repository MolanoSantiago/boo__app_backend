<?php

namespace Hex\Shared\Infrastructure\Logger;

use Hex\Shared\Domain\Contracts\LoggerInterface;
use Illuminate\Support\Facades\Log;

final class CustomLogger implements LoggerInterface
{
    public function info(string $message, array $context = []): void
    {
        Log::info($message, $context);
    }

    public function warning(string $message, array $context = []): void
    {
        Log::warning($message, $context);
    }

    public function error(string $message, array $context = []): void
    {
        Log::error($message, $context);
    }
}
