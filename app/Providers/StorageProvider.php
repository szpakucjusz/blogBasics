<?php
namespace App\Providers;

use App\Services\StorageService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class StorageProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->bind(StorageService::class, function ($app, $params) {
            return new \App\Services\StorageService;
        });
    }

    public function provides()
    {
        return [StorageService::class];
    }
}
