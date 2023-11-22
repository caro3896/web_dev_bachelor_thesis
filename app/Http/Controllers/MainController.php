<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Rewards\RewardsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Controller;
use Inertia\Inertia;

class MainController extends Controller
{
    // Call index page (rewards page)
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        // Retrieve the user's credits
        $userCredits = $user->credits; // Assuming you have a "credits" column in your users table

        // Get rewards and credits
        $rewardService = new RewardsService();
        $rewards = $rewardService->getAllRewards();

        // Render Index page and pass user credits to the view
        return Inertia::render('Index', [
            'userCredits' => $userCredits,
            'rewards' => $rewards,
        ]);
    }
}
