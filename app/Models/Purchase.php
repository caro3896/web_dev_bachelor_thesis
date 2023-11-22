<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reward_id',
    ];

    // A purchase belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A purchase belongs to a reward
    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
}
