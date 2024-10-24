<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{

    public static function findOrFail($id)
    {
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function gameGenres(): HasMany
    {
        return $this->hasMany(GameGenre::class);
    }
}
