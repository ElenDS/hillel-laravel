<?php
declare(strict_types=1);

namespace App\Services;

use UAParser\Parser;

class ClientOSService
{
    public string $os;

    public function __construct($userAgent)
    {
        $parser = Parser::create();
        $this->os = $parser->parse($userAgent)->os->family;
    }

    /**
     * @return string
     */
    public function getOs(): string
    {
        return $this->os;
    }
}
