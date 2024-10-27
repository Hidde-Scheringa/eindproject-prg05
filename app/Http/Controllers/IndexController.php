<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $gameQuery = Game::query();
        $gameQuery->where('verified', true);
        if ($request->filled('search')) {
            $search = $request->input('search');
            $gameQuery->whereAny(['name', 'publisher'],'LIKE', "%$search%");
        }


        $games = $gameQuery->get();
        $genres = Genre::all();
        return view('welcome', compact('games', 'genres'));
    }
}
