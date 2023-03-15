<?php

namespace App\Services\Adapter;

use App\Models\Client;
use App\Services\ClientCountryService;
use App\Services\ClientOSService;

class ClientRedirectService implements ClientRedirectInterface
{
    private ClientCountryService $clientCountryService;
    private ClientOSService $clientOSService;
    public function __construct(string $ip, string $userAgent)
    {
        $this->clientCountryService = new ClientCountryService($ip);
        $this->clientOSService = new ClientOSService($userAgent);
    }

    public function getRedirect(): string
    {
        $country = $this->clientCountryService->getCountry();
        $os = $this->clientOSService->getOs();
        if ($country === 'United States' && $os === 'Apply') {
            $redirect = 'amazon.com';
        } elseif ($country === 'United Kingdom' && $os === 'Ubuntu') {
            $redirect = 'moyo.com';
        } elseif ($country === 'India' && $os === 'Windows') {
            $redirect = 'alibaba.com';
        } elseif ($country === 'Ukraine') {
            $redirect = 'rozetka.com.ua';
        } else {
            $redirect = 'atb.ua';
        }

        return $redirect;
    }

    public function logClient()
    {
        $client = new Client();
        $client->country = $this->clientCountryService->getCountry();
        $client->os = $this->clientOSService->getOs();
        $client->redirect = $this->getRedirect();
        $client->save();
    }
}
