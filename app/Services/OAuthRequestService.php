<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OAuthRequestService
{
    public function getAccessToken()
    {
        $response = Http::post('https://accounts.google.com/o/oauth2/token', [
        'client_id'     => '941615024459-3qoa7da2d9qk8oup3fd2jjcr26kg190t.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect_uri'  => 'http://demo.ua/callback',
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code'],
    ]);
        $respData = $response->json();
        return $respData['access_token'];
    }

    public function getUserData($accessToken)
    {
        $responce = Http::withHeaders(['Authorization' => 'Bearer ' . $accessToken])->get('https://www.googleapis.com/oauth2/v1/userinfo');

        return $responce->json();
    }

}
