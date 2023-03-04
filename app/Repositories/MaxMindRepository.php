<?php

namespace App\Repositories;

use GeoIp2\Exception\AddressNotFoundException;
use GeoIp2\Model\City;
use MaxMind\Db\Reader\InvalidDatabaseException;

class MaxMindRepository implements MaxMindInterface
{
    public function __construct(readonly MaxMind $reader)
    {
    }

    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    public function mmCountry(string $ip): string
    {
        return $this->getCity($ip)->country->name;
    }

    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    public function mmCity(string $ip): string
    {
        return $this->getCity($ip)->city->name;
    }

    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    public function mmCode(string $ip): string
    {
        return $this->getCity($ip)->postal->code;
    }

    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    private function getCity(string $ip): City
    {
        return $this->reader->city($ip);
    }
}
