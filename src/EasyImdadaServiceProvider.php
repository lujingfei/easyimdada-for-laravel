<?php

namespace Geoff\EasyImdada;

use Illuminate\Support\ServiceProvider;

class EasyImdadaServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/config/easyimdada.php' => config_path('easyimdada.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('easyimdada', function ($app){
            return new EasyImdada($app['session'], $app['config']);
        });
    }

    public function provides()
    {
        return ['easyimdada'];
    }
}
