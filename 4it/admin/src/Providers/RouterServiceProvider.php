<?php
namespace ForIt\Admin\Providers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
class RouterServiceProvider extends ServiceProvider
{
    protected $namespace='\ForIt\Admin\Controllers';
    function boot(){
        parent::boot();
    }
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAdminRoutes();
    }
    function mapAdminRoutes(){
        Route::prefix('admin')
            ->middleware('admin')
            ->namespace($this->namespace)
            ->group(__DIR__.'/../../routes.php');
    }
}