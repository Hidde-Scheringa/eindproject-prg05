<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $gameQuery = Game::query();
        $gameQuery->where('verified', true);
        if ($request->filled('search')) {
            $search = $request->input('search');
//            $gameQuery->where('name', 'like', '%' . $search . '%')
//                ->orWhere('publisher', 'like', '%' . $search . '%');
            $gameQuery->whereAny(['name', 'publisher'],'LIKE', "%$search%");
        }


        $games = $gameQuery->get();
//        dd($games);

//        $games = Game::where('verified', true)->get();

        return view('welcome', compact('games'));
    }
}
