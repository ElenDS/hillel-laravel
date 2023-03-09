<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\OAuthRequestService;
use App\Services\UserRegService;
use Illuminate\Support\Facades\Auth;

class OAuthController extends Controller
{
    public function callbackOAuth(OAuthRequestService $oauthRequestService, UserRegService $userRegService)
    {
        $accessToken = $oauthRequestService->getAccessToken();
        $userData = $oauthRequestService->getUserData($accessToken);
        $email = $userData['email'];

        $user = User::where('email', $email)->first();
        if ($user) {
            Auth::login($user);
        } else {
            $user = $userRegService->newUser($email);
            Auth::login($user);
        }

        return redirect("/")->withSuccess('You have signed-in');
    }

}
