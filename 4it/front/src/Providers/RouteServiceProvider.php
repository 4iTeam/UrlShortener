<?php
namespace ForIt\Front\Providers;
use ForIt\Front\Controllers\RedirectController;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
class RouteServiceProvider extends ServiceProvider
{
    protected $namespace='\ForIt\Front\Controllers';
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapFrontRoutes();
        $this->app->booted(function(){
            $this->addRedirectRoute();
        });
    }
    function mapFrontRoutes(){
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../../routes.php');
    }
    function addRedirectRoute(){
        Route::get('{key}',RedirectController::class.'@redirect');
    }
}