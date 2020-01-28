<?php

namespace Ocornejo\Conekta;

use Illuminate\Support\ServiceProvider;

class ConektaServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'conekta');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(
            __DIR__ . '/config/conekta.php',
            'conekta'
        );
        $this->publishes([
            __DIR__ . '/config/conekta.php' => config_path('conekta.php'),
            __DIR__ . '/views' => resource_path('views/vendor/conekta'),
            __DIR__ . '/Http/Controllers/ConektaController.php' => app_path('Http/Controllers/ConektaController.php'),
            __DIR__ . '/Models' => app_path('/'),
            __DIR__ . '/Http/Requests/ConektaRequest.php' => app_path('Http/Requests/ConektaRequest.php'),
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ]);
    }

    public function register()
    {

    }

}
