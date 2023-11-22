<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRewardRequest;
use App\Models\reward;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Index');
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

        $image_path = '';

        // If a file has been uploaded, store the image in storage and save the path to the image in the database
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
            $newReward->image = $image_path;
        }

        // Save new reward and return with success message
        if ($newReward->save()) {
            $rewardName = $request->input('name');
            return redirect()->route('admin.rewards')->with('success', "Rewarden '$rewardName' blev tilføjet");
        }

        return back()->withErrors(['error' => "Oprettelse af reward mislykkedes"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reward $reward)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reward $reward)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reward $reward)
    {
        //
    }
}
