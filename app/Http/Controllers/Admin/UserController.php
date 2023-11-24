<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get users
        $users = User::get();

        // Render users page and send data
        return Inertia::render('Admin/Users/Index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Admin/Users/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // Create new user from model and insert data from form
        $newUser = new User;

        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->password = $request->input('password');
        // Set admin to false as default if request is empty
        $newUser->is_admin = $request->input('admin', 0);

        // Save user and return with success message
        if ($newUser->save()) {
            $userName = $request->input('name');
            return redirect()->route('admin.users.index')->with('success', "Brugeren '$userName' blev tilføjet");
        }
        return back()->withErrors(['error' => "Brugeroprettelse mislykkedes"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        // Find user from id
        $user = User::find($id);

        // If user exists, update user with data from form
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->is_admin = $request->input('admin');

            // Find password input
            $password = $request->input('password');
            // If password has input, set it as the new password
            if ($password) {
                $user->password = $request->input('password');
            }

            // Save user and return with success message
            if ($user->save()) {
                $userName = $request->input('name');
                return redirect()->route('admin.users.index')->with('success', "Brugeren '$userName' blev opdateret");
            }
            return back()->withErrors(['error' => "Opdatering af bruger mislykkedes"]);
        }
        return back()->withErrors(['error' => "Bruger ikke fundet"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete user from database
        $user->delete();
        return back()->with('success', "Brugeren '$user->name' blev slettet");
    }
}
