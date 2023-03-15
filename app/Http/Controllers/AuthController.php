<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistryRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthController extends Controller
{
    public function login(): View
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
    public function handleLogin(AuthRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        }

        return redirect("login");
    }

    public function registration(): View
    {
        return view('pages.registration');
    }

    public function handleRegistration(RegistryRequest $request): RedirectResponse
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return redirect("/login");
    }

    public function checkAuth(): RedirectResponse
    {
        if (Auth::check()) {
            return redirect('/admin/posts');
        }

        return redirect("/login");
    }

    public function logout(): RedirectResponse
    {
        session()->flush();
        Auth::logout();

        return redirect('/login');
    }
}
