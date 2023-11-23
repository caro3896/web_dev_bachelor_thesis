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

        // Check if the user is an admin
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.rewards.index'); // Redirect to admin page
        }

        // Retrieve the user's credits
        $userCredits = $user->credits;

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
