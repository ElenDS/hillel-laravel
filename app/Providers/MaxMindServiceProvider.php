<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MaxMindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('maxmind', function(){
            return new \App\Repositories\MaxMind();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
