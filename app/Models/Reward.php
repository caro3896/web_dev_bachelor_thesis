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
        'image'
    ];

    // Has many relationship to (a reward can be associated with many purchases)
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
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
