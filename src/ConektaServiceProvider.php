<?php

namespace Ocornejo\Conekta;

use Illuminate\Support\ServiceProvider;

class ConektaServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'conekta-laravel');
        $this->mergeConfigFrom(
            __DIR__ . '/config/conekta.php',
            'conekta'
        );
        $this->publishes([
            __DIR__ . '/config/conekta.php' => config_path('conekta.php'),
            __DIR__ . '/views' => resource_path('views/vendor/conekta'),
        ]);
        $this->publishes([
            __DIR__ . '/Http/Controllers/ConektaController.php' => app_path('Http/Controllers/ConektaController.php'),
        ]);
    }

    public function register()
    {
        
    }

}
