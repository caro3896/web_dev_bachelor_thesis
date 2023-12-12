<?php

namespace App\Http\Controllers;

use App\Models\Credits;
use App\Models\Reward;
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

        // Retrieve the credits
        $credits = Credits::first();

        // Retrieve rewards in ascending order by price
        $rewards = Reward::orderBy('price')->get();

        // Fetch voting status for each reward
        foreach ($rewards as $reward) {
            $reward->hasVoted = $reward->votes()->where('user_id', auth()->id())->exists();
        }

        // Render Index page and pass user credits to the view
        return Inertia::render('Index', [
            'credits' => $credits->amount,
            'rewards' => $rewards,
        ]);
    }

    public function admin()
    {
        return redirect()->route('admin.rewards.index'); // Redirect to admin page
    }
}
