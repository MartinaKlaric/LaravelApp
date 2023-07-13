<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\ConnectionServiceInterface;
use App\Service\ConnectionService;
use App\Service\MysqlConnectionService;
use App\Service\MediaAppService;
use App\Service\AppService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;


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
        Response::macro('caps', function(string $value){  //pozivam macro funkciju koju sam nazvala caps
            return Response::make(strtoupper($value));   //a koja će napraviti response tako da value izbaci zapisan velikim slovima
        });

        View::share('title', 'My App');

        Blade::directive('random', function(){
            return '<?php echo rand(1, 10); ?>';
        });
    }
}
