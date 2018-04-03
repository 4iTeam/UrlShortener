<?php
namespace ForIt\Admin\Providers;
use ForIt\Admin\Middleware\AuthenticateAdmin;
use Illuminate\Support\ServiceProvider;
use App\Support\Helper;
use Illuminate\Routing\Router;
class AdminProvider extends ServiceProvider{
    function boot(Router $router){
        $this->loadViewsFrom(__DIR__.'/../../resources/views','admin');
        $router->pushMiddlewareToGroup('admin',AuthenticateAdmin::class);


    }
    function register() {
        Helper::autoload(__DIR__.'/../../helpers');
        $this->app->register(RouterServiceProvider::class);
    }
}