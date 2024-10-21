<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view('loggedin', compact('games'));
    }

    public function show($id){
        $game = Game::find($id);
        $reviews = $game->reviews;

        return view('games.show', compact('game', 'reviews'));
    }

    public function create(){
        return view('games.create');
    }



    public function store(Request $request){
//        $request->validate();

        $game= new Game();
        $game->name = $request->input('name');
        $game->publisher = $request->input('publisher');
//        $game->playtime = $request->input('playtime');
        $game->user_id = auth()->user()->id;
        $game->total_playtime = 0;
        $game->cover_image = $request->input('cover_image');

        $game->save();
        return redirect()->route('games.index');
    }

}


