<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Models\Credits;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CreditsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $credits = Credits::first();

        return Inertia::render('Admin/Credits/Index', [
            'credits' => $credits->amount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Credits $credits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Credits $credits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Credits $credits)
    {
        $credits = Credits::first();
        $credits->increment('amount', $request->credits);
        return back()->with('success', "'$request->credits' credits tilføjet");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Credits $credits)
    {
        //
    }
}
