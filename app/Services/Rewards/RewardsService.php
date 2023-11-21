<?php

namespace App\Services\Rewards;

use App\Models\Reward;
use Illuminate\Database\Eloquent\Collection;

class RewardsService
{
    public function getAllRewards(): Collection
    {
        return Reward::get();
    }
}
