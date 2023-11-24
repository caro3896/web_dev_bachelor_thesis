<?php

namespace App\Models;

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
