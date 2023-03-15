<?php
declare(strict_types=1);

namespace App\Http\Controllers;


use App\Helpers\Facades\MaxMind;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;


class Controller extends BaseController
{
     public function show(): View
    {
        return view('pages.index');
    }

    public function showMaxmind(): View
    {
        $country = MaxMind::mmCountry('178.54.128.150');
        $city = MaxMind::mmCity('128.101.101.101');
        $code = MaxMind::mmCode('178.54.128.150');

        return view('pages.maxmind', ['country' => $country, 'city' => $city, 'code' => $code]);
    }

}
