<?php
namespace App\Providers;

use App\Services\PasswordService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PasswordProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->bind(PasswordService::class, function ($app, $params) {
            return new \App\Services\PasswordService;
        });
    }

    public function provides()
    {
        return [PasswordService::class];
    }
}
