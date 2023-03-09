<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OAuthRequestService
{
    public function getAccessToken()
    {
        $response = Http::post(env('GOOGLE_TOKEN_URI'), [
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
            'grant_type' => 'authorization_code',
            'code' => $_GET['code'],
        ]);

        $respData = $response->json();

        return $respData['access_token'];
    }

    public function getUserData($accessToken)
    {
        $response = Http::withHeaders(['Authorization' => 'Bearer ' . $accessToken])->get(env('GOOGLE_USER_INFO_URI'));

        return $response->json();
    }

}
