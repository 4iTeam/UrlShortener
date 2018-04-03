<?php
namespace ForIt\Admin\Providers;
use ForIt\Admin\Support\Facades\Message;
use ForIt\Admin\Middleware\AuthenticateAdmin;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use ForIt\Base\Support\Helper;
use Illuminate\Routing\Router;
class AdminProvider extends ServiceProvider{
    function boot(Router $router){
        $this->loadViewsFrom(__DIR__.'/../../resources/views','admin');
        $router->pushMiddlewareToGroup('admin','web');
        $router->pushMiddlewareToGroup('admin',AuthenticateAdmin::class);
        AliasLoader::getInstance()->alias('Message',Message::class);

    }
    function register() {
        Helper::autoload(__DIR__.'/../../helpers');
        $this->app->register(RouterServiceProvider::class);

    }
}