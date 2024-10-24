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

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'games_genre', 'games_id', 'genre_id');
    }
}
