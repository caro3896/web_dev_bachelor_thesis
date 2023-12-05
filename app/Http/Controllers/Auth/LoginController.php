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

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if the user is an admin
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.rewards.index'); // Redirect to admin page
            }

            return redirect()->intended(route('index'));
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
    public function destroy(Request $request)
    {
        Auth::logout();
        // Invalidate the session
        $request->session()->invalidate();
        // Regenerate the CSFR token
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
