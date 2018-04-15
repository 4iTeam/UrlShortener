<?php
namespace ForIt\Base\Providers;

use ForIt\Base\Commands\Install;
use ForIt\Base\Commands\UserCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
class ConsoleProvider extends ServiceProvider{
    protected $commands=[
        Install::class,
        UserCommand::class,
    ];
    function boot(){
        if($this->isArtisan()){
            $this->registerCommands();
        }
    }
    protected function registerCommands(){
        $this->commands($this->commands);
    }
    protected function isArtisan(){
        if(!defined('ARTISAN_BINARY')){
            return false;
        }
        if($this->app->resolved(ConsoleKernel::class)){
            return true;
        }
        return false;
    }
    protected function getKernel(){
        return $this->app->get(ConsoleKernel::class);
    }
}