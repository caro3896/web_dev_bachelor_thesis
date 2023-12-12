<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Redeemed extends Model
{
    use HasFactory;

    // protected $dateFormat = 'U';
    protected $table = 'redeemed';

    protected $fillable = [
        'reward_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    // A purchase belongs to a reward
    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
}
