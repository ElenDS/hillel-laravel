<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Client;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientTrackService implements ShouldQueue
{
    public function __construct(readonly string $ip, readonly string $userAgent)
    {
    }

    public function getCountry(): string
    {
        $country = new ClientCountryService($this->ip);

        return $country->getCountry();
    }

    public function getOS(): string
    {
        $os = new ClientOSService($this->userAgent);

        return $os->getOs();
    }

    public function getRedirect()
    {
        return 'some redirect url';
    }

    public function trackClient(): void
    {
        $client = new Client();
        $client->country = $this->getCountry();
        $client->os = $this->getOs();
        $client->redirect = $this->getRedirect();
        $client->save();
    }
}
