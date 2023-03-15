<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\OAuthRequestService;
use App\Services\UserRegService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OAuthController extends Controller
{
    public function callbackOAuth(OAuthRequestService $oauthRequestService, UserRegService $userRegService, Request $request): RedirectResponse
    {
        $accessToken = $oauthRequestService->getAccessToken($request->get('code'));
        $userData = $oauthRequestService->getUserData($accessToken);
        $email = $userData['email'];

        $user = User::where('email', $email)->first();
        if (!$user) {
            $user = $userRegService->newUser($email);
        }
        Auth::login($user);

        return redirect("/");
    }

}
