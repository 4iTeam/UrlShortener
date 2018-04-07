<?php

namespace App\Providers;

use App\Model\ApiKey;
use App\Model\Link;
use App\Model\Observers\ApiKeyObserver;
use App\Model\Observers\LinkObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Link::observe(LinkObserver::class);
        ApiKey::observe(ApiKeyObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
