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
        $country = MaxMind::country('178.54.128.150');
        $city = MaxMind::city('178.54.128.150');
        $code = MaxMind::code('178.54.128.150');

        return view('pages.maxmind', ['country' => $country, 'city' => $city, 'code' => $code]);
    }

}
