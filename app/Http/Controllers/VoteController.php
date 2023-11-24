<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Handle votes
     */
    public function vote(string $rewardId)
    {
        try {

            DB::beginTransaction();
            // Get the logged in user
            $user = Auth::user();

            // Find reward
            $reward = Reward::findOrFail($rewardId);

            // Check if the user has already voted for the reward
            $existingVote = Vote::where('user_id', $user->id)->where('reward_id', $rewardId)->first();

            if ($existingVote) {
                // If the user has already voted, remove the vote
                $existingVote->delete();

                // Update the vote count on the reward
                Reward::where('id', $rewardId)->decrement('votes');

                DB::commit();

                return back()->with('success', "Stemme på '$reward->name' fjernet");
            }

            // If the user has not voted, record the vote
            Vote::create([
                'user_id' => $user->id,
                'reward_id' => $rewardId,
            ]);

            // Update the vote count on the reward
            Reward::where('id', $rewardId)->increment('votes');

            DB::commit();

            return back()->with('success', "Du har stemt på '$reward->name'");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Noget gik galt, prøv igen senere']);
        }
    }
}
