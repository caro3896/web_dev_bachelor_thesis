<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Send user to index page if credentials ok
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('index');
        }

        // Send user back with error
        return back()->withErrors([
            'email' => 'Email findes ikke i systemet',
        ])->onlyInput('email');
    }

    // Logout and redirect
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
