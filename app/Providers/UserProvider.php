<?php
namespace App\Providers;

use App\Services\UserService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->bind(UserService::class, function ($app, $params) {
            return new \App\Services\UserService;
        });
    }

    public function provides()
    {
        return [UserService::class];
    }
}
