<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'votes',
        'redeemed'
    ];

    protected $casts = [
        'redeemed' => 'boolean'
    ];

    // Has many relationship to votes (a reward can be associated with many votes)
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // Adds a computed attribute with the image url
    protected $appends = ['image_url'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    // Generates the URL 
    public function getImageUrlAttribute(): string
    {
        return Storage::url($this->image);
    }
}
