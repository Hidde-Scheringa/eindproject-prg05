<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class GameController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
           new Middleware('auth', except: ['show','index']),
        ];
    }
    public function index(Request $request)
    {
        $gameQuery = Game::query();
        $gameQuery->where('verified', true);
        if ($request->filled('search')) {
            $search = $request->input('search');
            $gameQuery->whereAny(['name', 'publisher'],'LIKE', "%$search%");
        }


        $games = $gameQuery->get();
        return view('loggedin', compact('games'));
    }

    public function inlogHandler(){
        $games = Game::where('verified', true)->get();
        if (Auth::user()->admin){
            return view('admin.dashboard');
        } else{
            return view('loggedin',['games' => $games]);
        }
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'cover_image' =>['required', 'string', 'max:1000']
        ]);

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


