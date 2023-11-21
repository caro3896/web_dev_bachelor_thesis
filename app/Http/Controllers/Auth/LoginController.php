<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    // Render login page
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    // Check credentials on login
    public function store(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Send user to index page if credentials ok
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('index');
        }

        // Check if the email exists in the system (if it does, password is incorrect)
        if (Auth::getProvider()->retrieveByCredentials($credentials)) {
            return back()->withErrors([
                'password' => 'Forkert password',
            ])->onlyInput('email');
        }

        // If email doesn't exist, return with a general error message
        return back()->withErrors([
            'email' => 'Email ikke fundet i systemet',
        ])->onlyInput('email');
    }

    // Logout and redirect
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
