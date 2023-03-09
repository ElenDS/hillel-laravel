<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistryRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $parameters = [
            'redirect_uri'  => env('GOOGLE_REDIRECT_URI'),
            'response_type' => 'code',
            'client_id'     => env('GOOGLE_CLIENT_ID'),
            'scope'         => env('GOOGLE_SCOPE_email'). ' ' . env('GOOGLE_SCOPE_profile'),
        ];

        $link = env('GOOGLE_AUTH_URI') . '?' . http_build_query($parameters);

        return view('pages.login', ['link' => $link]);
    }
    public function handleLogin(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function handleFacebookOAuth(Request $request)
    {

    }

    public function registration()
    {
        return view('pages.registration');
    }

    public function handleRegistration(RegistryRequest $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return redirect("/login")->withSuccess('You have signed-in');
    }

    public function checkAuth()
    {
        if (Auth::check()) {
            return redirect('/admin/posts');
        }

        return redirect("/login")->withSuccess('You are not allowed to access');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('/login');
    }
}
