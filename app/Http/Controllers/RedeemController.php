<?php

namespace App\Http\Controllers;

use App\Models\Redeemed;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class RedeemController extends Controller
{
    public function index()
    {

        // Get all purchases - latest first 
        $redeemed = Redeemed::latest()->get();

        // Render users page and send data
        return Inertia::render('Admin/Redeemed/Index', [
            'redeemed' => $redeemed
        ]);
    }
    public function buy(string $id)
    {
        // Get the logged in user
        $user = Auth::user();

        // Find reward
        $reward = Reward::findOrFail($id);

        // Check if user has enough credits
        if ($user->credits < $reward->price) {
            return back()->withErrors(['error' => "Ikke nok credits til at købe denne reward"]);
        }

        // Begin transaction
        DB::beginTransaction();

        try {
            // Subtract the price of the reward and decrease quantity
            // $user->decrement('credits', $reward->price);
            $user->credits -= $reward->price;
            $user->save();

            // Create a record in the Purchases table
            Redeemed::create([
                'user_id' => $user->id,
                'reward_id' => $reward->id,

            ]);

            // Commit the transaction
            DB::commit();
        } catch (\Exception $ex) {
            Log::error('Purchase failed: ' . $ex->getMessage());
            DB::rollBack();
            return back()->withErrors(['error' => 'Noget gik galt, prøv igen senere']);
        }
    }
}
