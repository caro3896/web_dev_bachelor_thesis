<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Rewards\RewardsService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    // Call admin rewards page
    public function rewards()
    {
        // Get rewards
        $rewardService = new RewardsService();
        $rewards = $rewardService->getAllRewards();

        // Render rewards page and send data
        return Inertia::render('Admin/Rewards/Index', [
            'rewards' => $rewards,
        ]);
    }

    // // Call admin users page
    // public function users()
    // {
    //     // Get users
    //     $users = User::get();

    //     // Render users page and send data
    //     return Inertia::render('Users', [
    //         'users' => $users
    //     ]);
    // }
}
