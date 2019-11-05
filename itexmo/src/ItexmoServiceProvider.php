<?php 

namespace Mangao05\Itexmo;

use Illuminate\Support\ServiceProvider;

class ItexmoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->publishes([
            __DIR__ . '/Config/itexmo.php' => config_path('itexmo.php'),
        ]);
        
    }

    public function register()
    {
        $this->app->bind('mangao05-itexmo', function(){
            return new Itexmo();
        });
    }
}