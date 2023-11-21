<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];

    // Haa many relationship to (a reward can be associated with many purchases)
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
