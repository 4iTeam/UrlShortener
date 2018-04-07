<?php
namespace ForIt\Api\Providers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
class RouteServiceProvider extends ServiceProvider
{
    protected $namespace='\ForIt\Api\Controllers';
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
    }
    function mapApiRoutes(){
        Route::middleware('api')
            ->prefix('api/v1')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../../routes.php');
    }
}