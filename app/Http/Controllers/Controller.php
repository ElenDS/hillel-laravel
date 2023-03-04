<?php

namespace App\Http\Controllers;


use App\Helpers\Facades\MaxMind;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        return view('pages.index');
    }

    public function showMaxmind()
    {
        $country = MaxMind::mmCountry('178.54.128.150');
        $city = MaxMind::mmCity('128.101.101.101');
        $code = MaxMind::mmCode('178.54.128.150');

        return view('pages.maxmind', ['country' => $country, 'city' => $city, 'code' => $code]);
    }

}
