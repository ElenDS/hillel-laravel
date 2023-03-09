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
        $parameters = [
            'redirect_uri'  => env('GOOGLE_REDIRECT_URI'),
            'response_type' => 'code',
            'client_id'     => env('GOOGLE_CLIENT_ID'),
            'scope'         => env('GOOGLE_SCOPES'),
        ];

        $link = env('GOOGLE_AUTH_URI') . '?' . http_build_query($parameters);

        return view('pages.index', ['link' => $link]);
    }

    public function showMaxmind()
    {
        $country = MaxMind::mmCountry('178.54.128.150');
        $city = MaxMind::mmCity('128.101.101.101');
        $code = MaxMind::mmCode('178.54.128.150');

        return view('pages.maxmind', ['country' => $country, 'city' => $city, 'code' => $code]);
    }

}
