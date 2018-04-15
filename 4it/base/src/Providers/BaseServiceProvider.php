<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 03-Apr-18
 * Time: 11:16 PM
 */

namespace ForIt\Base\Providers;

use App\Model\Link;
use ForIt\Base\Services\HashIds;
use ForIt\Base\Support\Helper;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    function boot(){
        Schema::defaultStringLength(191);
        Helper::autoload(__DIR__.'/../../helpers');
    }
    function register(){
        $this->app->singleton(HashIds::class);
        $this->app->register(ConsoleProvider::class);
        $this->mergeConfigFrom(
            __DIR__.'/../../config/hashids.php', 'hashids'
        );
    }
}