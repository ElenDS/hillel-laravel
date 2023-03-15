<?php

namespace App\Providers;

use App\Services\Adapter\ClientRedirectService;
use App\Services\ClientCountryService;
use App\Services\ClientOSService;
use Illuminate\Support\ServiceProvider;
use PharIo\Manifest\Application;

class ClientRedirectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        app()->singleton(ClientRedirectService::class, function ($app) {
//            return new ClientRedirectService(new ClientCountryService(), new ClientOSService());
//        });
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
