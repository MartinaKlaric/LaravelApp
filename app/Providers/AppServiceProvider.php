<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\ConnectionServiceInterface;
use App\Service\ConnectionService;
use App\Service\MysqlConnectionService;
use App\Service\MediaAppService;
use App\Service\AppService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ConnectionServiceInterface::class, MysqlConnectionService::class);
        $this->app->when(MediaAppService::class)->needs(ConnectionServiceInterface::class)->give(ConnectionService::class);   
        $this->app->when(AppService::class)->needs('$config')->give(['foo'=> 'bar']);   
    }         

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
