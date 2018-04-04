<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 03-Apr-18
 * Time: 11:16 PM
 */

namespace ForIt\Base\Providers;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    function boot(){
        Schema::defaultStringLength(191);
    }
}