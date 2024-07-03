<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TarrifRepository;
use App\Repositories\TarrifRepositoryInterface;
use App\Services\TarrifService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TarrifRepositoryInterface::class, TarrifRepository::class);
        $this->app->bind(TarrifService::class, function ($app) {
            return new TarrifService($app->make(TarrifRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
