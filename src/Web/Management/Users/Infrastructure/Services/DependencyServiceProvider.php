<?php

namespace Hex\Web\Management\Users\Infrastructure\Services;

use Hex\Web\Management\Users\Application\Post\SaveUserUseCase;
use Hex\Web\Management\Users\Domain\Contracts\UserRepositoryInterface;
use Hex\Web\Management\Users\Infrastructure\Persistence\Repositories\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app
            ->when(SaveUserUseCase::class)
            ->needs(UserRepositoryInterface::class)
            ->give(UserRepository::class);
    }
}
