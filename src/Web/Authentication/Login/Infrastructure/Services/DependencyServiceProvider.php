<?php

namespace Hex\Web\Authentication\Login\Infrastructure\Services;

use Hex\Web\Authentication\Login\Application\Post\LoginUseCase;
use Hex\Web\Authentication\Login\Domain\Contracts\LoginRepositoryInterface;
use Hex\Web\Authentication\Login\Infrastructure\Persistence\Repositories\Eloquent\LoginRepository;
use Illuminate\Support\ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app
            ->when(LoginUseCase::class)
            ->needs(LoginRepositoryInterface::class)
            ->give(LoginRepository::class);
    }
}
