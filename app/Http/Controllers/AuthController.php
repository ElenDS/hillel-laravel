<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.login');
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

    public function registration()
    {
        return view('pages.registration');
    }

    public function handleRegistration(AuthRequest $request)
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
