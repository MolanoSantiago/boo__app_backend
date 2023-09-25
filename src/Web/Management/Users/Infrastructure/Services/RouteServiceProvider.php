<?php

namespace Hex\Web\Management\Users\Infrastructure\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

final class RouteServiceProvider extends ServiceProvider
{
    protected $controllerNamespace = 'Hex\Web\Management\Users\Infrastructure\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapRoutes();
    }

    public function mapRoutes()
    {
        Route::prefix('api')
            ->namespace($this->controllerNamespace)
            ->group(base_path('src/Web/Management/Users/Infrastructure/Routes/api.php'));
    }
}
