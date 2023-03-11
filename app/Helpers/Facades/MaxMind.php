<?php
namespace App\Helpers\Facades;
use Illuminate\Support\Facades\Facade;

class MaxMind extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'maxmindFacade';
    }

}
