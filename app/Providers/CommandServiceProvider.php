<?php

namespace App\Providers;

use App\Console\Commands\GetNewsFromApi;
use App\Services\NewsApiService\NewsApiRequestService;
use App\Services\NewsApiService\NewsRequestInterface;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->when(GetNewsFromApi::class)
            ->needs(NewsRequestInterface::class)
            ->give(function ($app) {
                return new NewsApiRequestService();
            });
    }

    public function boot()
    {

    }
}
