<?php

namespace App\Http\Controllers;

use App\Models\Credits;
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
        $redeemed = Redeemed::with('reward')->latest()->get();

        // Render users page and send data
        return Inertia::render('Admin/Redeemed/Index', [
            'redeemed' => $redeemed
        ]);
    }

    public function redeem(string $id)
    {
        try {
            // Begin transaction
            DB::beginTransaction();

            // Find reward
            $reward = Reward::find($id);

            if ($reward) {
                $credits = Credits::first();

                // Check if there is enough credits
                if ($credits->amount >= $reward->price) {
                    // Deduct the price from the credits
                    $credits->amount -= $reward->price;
                    $credits->save();

                    // Record the redeemed reward in the redeemed table
                    Redeemed::create([
                        'reward_id' => $id,
                    ]);

                    // Set the redeemed column to true
                    $reward->update(['redeemed' => true]);

                    DB::commit();

                    return back()->with('success', 'Rewarden blev indløst');
                }
            }
        } catch (\Exception $ex) {
            Log::error('Purchase failed: ' . $ex->getMessage());
            DB::rollBack();
            return back()->withErrors(['error' => 'Noget gik galt, prøv igen senere']);
        }
    }
}
