<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

use function Psy\debug;

class VoteController extends Controller
{
    /**
     * Handle votes
     */
    public function vote(string $rewardId)
    {
        // Get the logged in user
        $user = Auth::user();

        // Find reward
        $reward = Reward::findOrFail($rewardId);

        // Check if the user has already voted for the reward
        $existingVote = Vote::where('user_id', $user->id)->where('reward_id', $rewardId)->first();

        if ($existingVote) {
            // If the user has already voted, remove the vote
            $existingVote->delete();

            return back()->with('success', "Stemme på '$reward->name' fjernet");
        }

        // If the user has not voted, record the vote
        Vote::create([
            'user_id' => $user->id,
            'reward_id' => $rewardId,
        ]);

        return back()->with('success', "Du har stemt på '$reward->name'");
    }

    /**
     * Handle votes reset
     */

    public function reset()
    {
        try {
            DB::beginTransaction();
            // Delete all records from the votes table
            Vote::truncate();

            // Reset the votes column to 0 for all rewards
            Reward::query()->update(['votes' => 0]);

            DB::commit();

            return back()->with(['success' => 'Alle stemmer blev nulstillet']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Noget gik galt']);
        }
    }
}
