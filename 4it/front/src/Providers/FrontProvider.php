<?php
namespace ForIt\Front\Providers;
use Illuminate\Support\ServiceProvider;

class FrontProvider extends ServiceProvider{
    function register(){
        $this->loadViewsFrom(__DIR__.'/../../resources/views','front');
        $this->app->register(RouteServiceProvider::class);
    }
    function boot(){

    }
}