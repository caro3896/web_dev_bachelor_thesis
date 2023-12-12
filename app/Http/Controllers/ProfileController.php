<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Get all purchases - latest first 
        // $redeemed = Redeemed::with('reward')->latest()->get();

        // Render users page and send data
        return Inertia::render('Profile', [
            'user' => $user
        ]);
    }
}
