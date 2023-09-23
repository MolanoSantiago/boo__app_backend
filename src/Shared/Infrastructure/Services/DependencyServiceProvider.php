<?php

namespace Hex\Shared\Infrastructure\Services;

use Illuminate\Support\ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \Hex\Shared\Domain\Contracts\LoggerInterface::class,
            \Hex\Shared\Infrastructure\Logger\CustomLogger::class
        );

        $this->app->bind(
            \Hex\Shared\Domain\Contracts\MailInterface::class,
            \Hex\Shared\Infrastructure\Mail\CustomMail::class
        );

        $this->app->bind(
            \Hex\Shared\Domain\Contracts\MessagingInterface::class,
            \Hex\Shared\Infrastructure\Messaging\CustomMessaging::class
        );
    }
}
