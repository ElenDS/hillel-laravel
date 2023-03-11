<?php

namespace App\Services;

use App\Helpers\Facades\MaxMind;

class ClientCountryService
{
    public string $country;

    public function __construct()
    {
        $this->country = MaxMind::mmCountry($_SERVER['REMOTE_ADDR']);
    }
}
