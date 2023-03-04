<?php

namespace App\Providers;

use App\Repositories\MaxMind;
use App\Repositories\MaxMindInterface;
use App\Repositories\MaxMindRepository;
use Illuminate\Support\ServiceProvider;
use PharIo\Manifest\Application;

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
            return new MaxMindRepository(new MaxMind($_SERVER['DOCUMENT_ROOT'] . '/GeoLite2-City.mmdb'));
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
