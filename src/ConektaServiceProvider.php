<?php

namespace Ocornejo\Conekta;

use Illuminate\Support\ServiceProvider;

class ConektaServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'conekta-laravel');
    }

    public function register()
    {
        
    }

}
