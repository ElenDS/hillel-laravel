<?php

namespace App\Services\Adapter;

use App\Models\Client;
use App\Services\ClientCountryService;
use App\Services\ClientOSService;

class ClientRedirectService implements ClientRedirectInterface
{
    public function __construct(
        readonly ClientCountryService $clientCountryService,
        readonly ClientOSService $clientOSService
    )
    {}

    public function getRedirect(): string
    {
        $country = $this->clientCountryService->country;
        $os = $this->clientOSService->os;
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
        $client->country = $this->clientCountryService->country;
        $client->os = $this->clientOSService->os;
        $client->redirect = $this->getRedirect();
        $client->save();
    }
}
