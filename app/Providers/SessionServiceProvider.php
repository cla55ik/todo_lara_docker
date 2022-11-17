<?php

namespace App\Providers;

use App\Helpers\HelperInterface;
use App\Helpers\SessionHelper;
use App\Services\SessionService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SessionServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->when(SessionService::class)
            ->needs(HelperInterface::class)
            ->give(function ($app) {
                return new SessionHelper();
            });
    }

    public function provides()
    {
        return [HelperInterface::class];
    }

    public function boot()
    {

    }
}
