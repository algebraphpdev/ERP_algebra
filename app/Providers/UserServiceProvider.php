<?php

namespace App\Providers;

use App\Services\UserActivityService;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('useractivity', function($app){
            return new UserActivityService($app->view);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        AliasLoader::getInstance()->alias('UserActivity', 'App\Facades\UserActivity');
    }
}
