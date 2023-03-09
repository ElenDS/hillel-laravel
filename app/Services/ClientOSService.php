<?php

namespace App\Services;

use UAParser\Parser;

class ClientOSService
{
    public string $os;

    public function __construct()
    {
        $parser = Parser::create();
        $this->os = $parser->parse($_SERVER['HTTP_USER_AGENT'])->os->family;
    }
}
