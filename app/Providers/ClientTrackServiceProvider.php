<?php

declare(strict_types=1);

namespace App\Providers;

use App\Jobs\ProcessClientTrack;
use Illuminate\Support\ServiceProvider;

class ClientTrackServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     * @return void
     */
    public function boot(): void
    {
        $this->app->bindMethod([ProcessClientTrack::class, 'handle'], function (ProcessClientTrack $job) {
            $job->handle();
        });
    }
}
