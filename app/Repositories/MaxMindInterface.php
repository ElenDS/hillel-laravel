<?php

namespace App\Repositories;

interface MaxMindInterface
{
    public function mmCountry(string $ip): string;
    public function mmCity(string $ip): string;
    public function mmCode(string $ip): string;
}
