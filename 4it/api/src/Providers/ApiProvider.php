<?php
namespace ForIt\Api\Providers;
use ForIt\Api\MiddleWare\ApiMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ApiProvider extends ServiceProvider{
    function register(){
        $this->loadViewsFrom(__DIR__.'/../../resources/views','front');
        $this->app->register(RouteServiceProvider::class);
    }
    function boot(Router $router){
        $router->pushMiddlewareToGroup('api',ApiMiddleware::class);
    }
}