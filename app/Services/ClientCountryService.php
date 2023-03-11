<?php

namespace App\Services;

use App\Helpers\Facades\MaxMind;

class ClientCountryService
{
    private string $country;

    public function __construct($ip)
    {
        $this->country = MaxMind::mmCountry($ip);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

}
