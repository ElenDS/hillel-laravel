<?php
declare(strict_types=1);

namespace App\Services;

use App\Helpers\Facades\MaxMind;

class ClientCountryService
{
    public string $country;

    public function __construct($ip)
    {
        $this->country = MaxMind::mmCountry('178.54.128.150');
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}
