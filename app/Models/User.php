<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean'
    ];

    // Registering Eloquent events using the boot method
    protected static function boot()
    {
        parent::boot();

        // Event triggered when a user is being deleted
        static::deleting(function ($user) {
            // For each reward associated with the user, decrement the votes column
            $user->votes->each(function ($vote) {
                $vote->reward->decrement('votes');
            });
        });
    }

    // Has many relationshop to votes (users can have multiple votes)
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // Has many trough relationship (rewards through votes), access to a users votes
    public function rewards()
    {
        return $this->hasManyThrough(Reward::class, Vote::class);
    }
}
