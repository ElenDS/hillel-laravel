<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\MaxMind;
use App\Repositories\MaxMindRepository;
use Illuminate\Support\ServiceProvider;

class MaxMindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        app()->singleton('maxmindFacade', function () {
            return new MaxMindRepository(new MaxMind(__DIR__ . '/../Services/GeoLite2-City.mmdb'));
        });
    }

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
