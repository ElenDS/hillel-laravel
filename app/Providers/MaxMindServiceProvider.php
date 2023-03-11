<?php

namespace App\Providers;

use App\MaxMind;
use App\MaxMindService;
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
        app()->singleton('maxmindFacade', function(){
            return new MaxMindService(new MaxMind($_SERVER['DOCUMENT_ROOT'] . '/GeoLite2-City.mmdb'));
        });
    }

    /**
     * Bootstrap services.

     * @return void
     */
    public function boot()
    {
        //
    }
}
