<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRewardRequest;
use App\Http\Requests\UpdateRewardRequest;
use App\Models\Reward;
use App\Services\Rewards\RewardsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get rewards
        // $rewardService = new RewardsService();
        // $rewards = $rewardService->getAllRewards();
        $rewards = Reward::get();
        // Render rewards page and send data
        return Inertia::render('Admin/Rewards/Index', [
            'rewards' => $rewards,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Admin/Rewards/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRewardRequest $request)
    {
        // Validation through StoreRewardRequest (see Requests)

        // Create new reward from model and insert data from form
        $newReward = new Reward;
        $newReward->name = $request->input('name');
        $newReward->description = $request->input('description');
        $newReward->price = $request->input('price');
        $newReward->votes = 0;

        $image_path = '';

        // If a file has been uploaded, store the image in storage and save the path to the image in the database
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
            $newReward->image = $image_path;
        }

        // Save new reward and return with success message
        if ($newReward->save()) {
            $rewardName = $request->input('name');
            return redirect()->route('admin.rewards.index')->with('success', "Rewarden '$rewardName' blev tilføjet");
        }

        return back()->withErrors(['error' => "Oprettelse af reward mislykkedes"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reward $reward)
    {
        return Inertia::render('Admin/Rewards/Edit', [
            'reward' => $reward,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRewardRequest $request, string $id)
    {
        // Validation through UpdateRewardRequest (see Requests)

        // Find exisitin reward
        $exisitingReward = Reward::find($id);

        // If reward exists, insert data from form
        if ($exisitingReward) {
            $exisitingReward->name = $request->input('name');
            $exisitingReward->description = $request->input('description');
            $exisitingReward->price = $request->input('price');

            // If a file has been uploaded, store the image in storage and save the path to the image in the database
            if ($request->hasFile('image')) {
                $image_path = $request->file('image')->store('image', 'public');
                $exisitingReward->image = $image_path;
            }

            // Save new reward and return with success message
            if ($exisitingReward->save()) {
                return redirect()->route('admin.rewards.index')->with('success', "Reward '$exisitingReward->name' opdateret");
            }
            return back()->withErrors(['error' => "Opdatering af reward mislykkedes"]);
        }
        return back()->withErrors(['error' => "Reward ikke fundet"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reward $reward)
    {
        // Delete the image from storage and from database
        if (Storage::delete($reward->image)) {
            $reward->delete();
            return back()->with('success', "Reward '$reward->name' slettet");
        }
        return back()->withErrors('error', "Rewarden blev ikke slettet");
    }
}
