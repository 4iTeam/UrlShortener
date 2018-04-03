<?php
namespace ForIt\Front\Providers;
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
    }
    function mapFrontRoutes(){
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../../routes.php');
    }
}