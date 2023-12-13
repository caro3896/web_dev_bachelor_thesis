<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    // protected $dateFormat = 'U';

    protected $fillable = [
        'user_id',
        'reward_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    // Registering Eloquent events using the boot method
    protected static function boot()
    {
        parent::boot();

        // Event triggered when a new vote is created
        static::created(function ($vote) {
            // Update the votes column in the associated Reward model (increment)
            $vote->reward->increment('votes');
        });

        // Event triggered when a vote is deleted
        static::deleted(function ($vote) {
            Log::info('Vote deleted event triggered');

            // Log information about the vote and its associated reward
            Log::info($vote->toArray());
            Log::info($vote->reward->toArray());

            // Update the votes column in the associated Reward model (decrement)
            $vote->reward->decrement('votes');
        });
    }

    // A vote belongs to a reward
    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    // A vote belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
