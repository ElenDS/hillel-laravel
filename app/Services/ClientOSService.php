<?php

namespace App\Services;

use UAParser\Parser;

class ClientOSService
{
    private string $os;

    public function __construct($userAgent)
    {
        $parser = Parser::create();
        $this->os = $parser->parse($userAgent)->os->family;
    }
    public function getOS(){
        return $this->os;
    }
}
