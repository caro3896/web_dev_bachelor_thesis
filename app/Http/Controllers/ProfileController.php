<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $votes = Vote::with('reward')->where('user_id', $user->id)->get();

        // Render profile page and send data
        return Inertia::render('Profile', [
            'user' => $user,
            'votes' => $votes
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        // Render settings page and send data
        return Inertia::render('Settings', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        // Find user from id
        $user = Auth::user();

        // If user exists, update user with data from form
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            // Find password input
            $password = $request->input('password');
            // If password has input, set it as the new password
            if ($password) {
                $user->password = $request->input('password');
            }

            // Save user and return with success message
            if ($user->save()) {
                return back()->with('success', "Info blev opdateret");
            }
            return back()->withErrors(['error' => "Opdatering af bruger mislykkedes"]);
        }
        return back()->withErrors(['error' => "Bruger ikke fundet"]);
    }
}
